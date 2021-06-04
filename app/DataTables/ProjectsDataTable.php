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
                $papType = $project->pap_type->name ?? '';
                return '<span class="badge badge-'. ($papType == 'Project' ? 'success' : 'danger') .' ">'. $papType .'</span>';
            })
            ->addColumn('office', function ($row) {
                return $row->office->name ?? '';
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
                $img = $project->creator ? '<img src="'. $project->creator->avatar .'" class="img-circle img-bordered-sm" alt="user-img" width="50" height="50">' : '';
                return $project->creator ? $img .'<br/><span class="text-muted text-sm">'. $project->creator->name ?? '' . '</span>' ?? '' : '';
            })
            ->addColumn('trip', function ($row) {
                if ($row->has_infra) {
                    if ($row->trip_info) {
                        $tripButton = '<a href="' . route('trips.edit', $row) . '" class="btn btn-success btn-sm">TRIP</a>';
                    } else {
                        $tripButton = '<a href="' . route('trips.create', $row) . '" class="btn btn-success btn-sm">TRIP</a>';
                    }
                    return $tripButton;
                }
            })
            ->addColumn('action', function ($row) {
                $user = auth()->user();
                $viewButton = $user->can('view', $row) ? '<a href="' . route('projects.show', $row) . '" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    <span>View</span>
                </a>' : '';
                $editButton = $user->can('update', $row) ? '<a href="' . route('projects.edit', $row) . '" class="btn btn-secondary btn-sm ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                    <span>Edit</span>
                </a>' : '';

                $printButton = '<a target="_blank" href="'. route('projects.generatePdf', $row) .'" class="btn btn-info btn-sm ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Print</span>
                </a>';

                return $viewButton . $editButton . $printButton;
            })
            ->rawColumns(['pap_type','created_by','trip','action']);
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
                        'processing'    => true,
                        'responsive'    => true,
                        'serverSide'    => true,
                        'sPaginationType' => 'full_numbers',
                        'order'         => [[0, 'asc']],
                        "lengthMenu"    => [[10, 25, 50], [10, 25, 50]],
                    ])
                    ->columns($this->getColumns())
                    ->minifiedAjax()
//                    ->dom('Bfrtip')
                    ->orderBy(1);
//                    ->buttons(
//                        Button::make('export'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
//                    );
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
                ->width('25%')
                ->addClass('text-sm'),
            Column::make('pap_type')
                ->addClass('text-sm text-center'),
            Column::make('office')
                ->addClass('text-sm text-center'),
//            Column::make('description')
//                ->width('25%')
//                ->addClass('text-sm'),
            Column::make('total_project_cost')
                ->addClass('text-sm text-right'),
            Column::make('created_by')
                ->addClass('text-sm text-center'),
            Column::make('updated_at')
                ->title('Last Updated')
                ->addClass('text-sm text-center'),
//            Column::make('permissions'),
            Column::make('trip'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center text-nowrap'),
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
