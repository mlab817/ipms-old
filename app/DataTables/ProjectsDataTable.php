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
            ->addColumn('created_by', function ($project) {
                return $project->creator->name ?? '';
            })
//            ->addColumn('permissions', function ($row) {
//                return json_encode($row->permissions);
//            })
            ->addColumn('action', function ($row) {
                if ($row->trip_info) {
                    $tripButton = '<a href="' . route('trips.edit', $row->uuid) . '" class="btn btn-success">TRIP</a>';
                } else {
                    $tripButton = '<a href="' . route('trips.create', $row->uuid) . '" class="btn btn-success">TRIP</a>';
                }

                $viewButton = $row->permissions['view'] ? '<a href="' . route('projects.show', $row->uuid) . '" class="btn btn-primary">View</a>' : '';
                $editButton = $row->permissions['update'] ? '<a href="' . route('projects.edit', $row->uuid) . '" class="btn btn-secondary">Edit</a>' . $tripButton : '';
                $deleteButton = $row->permissions['delete'] ? '<button class="btn btn-danger" onClick="confirmDelete(\''. $row->uuid .'\')">Delete</button>' : '';

                return '<div class="btn-group-vertical">'
                    . $viewButton
                    . $editButton
                    . $deleteButton
                    . '</div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model->newQuery();
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
