<?php

namespace App\DataTables;

use App\Models\Project;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProjectsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->order(function ($query) {
                $query->orderBy('updated_at','DESC');
            })
            ->addColumn('pap_type', function ($project) {
                return $project->pap_type->name ?? '';
            })
            ->editColumn('description', function ($project) {
                if (strlen($project->description) > 100) {
                    return Str::limit($project->description, 100);
                }
                return $project->description;
            })
            ->editColumn('total_project_cost', function ($project) {
                return number_format($project->total_project_cost, 2);
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans(null, null, true);
            })
            ->addColumn('created_by', function ($project) {
                $img = '<img src="'.$project->creator->avatar.'" class="img-circle img-bordered-sm" alt="user-img" width="50" height="50">';
                return $img .'<br/><span class="text-muted text-sm">'. $project->creator->name . '</span>' ?? '';
            })
            ->addColumn('trip', function ($row) {
                if ($row->has_infra) {
                    if ($row->trip_info) {
                        $tripButton = '<a href="' . route('trips.edit', $row) . '" class="btn btn-success">TRIP</a>';
                    } else {
                        $tripButton = '<a href="' . route('trips.create', $row) . '" class="btn btn-success">TRIP</a>';
                    }
                    return $tripButton;
                }
            })
            ->addColumn('action', function ($row) {
                $viewButton = $row->permissions['view'] ? '<a href="' . route('projects.show', $row) . '" class="btn btn-primary"><i class="fas fa-eye"></i></a>' : '';
                $editButton = $row->permissions['update'] ? '<a href="' . route('projects.edit', $row) . '" class="btn btn-secondary"><i class="fas fa-edit"></i></a>' : '';
                $deleteButton = $row->permissions['delete'] ? '<button class="btn btn-danger" onClick="confirmDelete(\''. $row->getRouteKey() .'\')"><i class="fas fa-trash"></i></button>' : '';

                return '<div class="btn-group">'
                    . $viewButton
                    . $editButton
                    . $deleteButton
                    . '</div>';
            })
            ->rawColumns(['created_by','trip','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model->with('creator.office','pap_type')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('projects-table')
                    ->parameters([
                        'responsive' => true
                    ])
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
//            Column::make('id'),
            Column::make('title')
                ->width('25%'),
            Column::make('pap_type')
                ->width('15%'),
            Column::make('description')
                ->width('25%'),
            Column::make('total_project_cost')
                ->addClass('text-right'),
            Column::make('created_by')
                ->addClass('text-center'),
            Column::make('updated_at')
                ->title('Last Updated')
                ->addClass('text-center'),
//            Column::make('permissions'),
            Column::make('trip'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Projects_' . date('YmdHis');
    }
}
