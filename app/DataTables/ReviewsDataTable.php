<?php

namespace App\DataTables;

use App\Models\Project;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReviewsDataTable extends DataTable
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
            ->addColumn('title', function ($row) {
                return '<a href="'. route('projects.show', $row) .'">' . $row->title. '</a>';
            })
            ->addColumn('pap_type', function($project) {
                return $project->pap_type->name ?? '';
            })
            ->addColumn('office', function ($row) {
                return $row->creator->office->name ?? '';
            })
            ->addColumn('reviewed', function($project) {
                if ($project->review()->exists()) {
                    return '<span class="badge badge-success">Yes</span>';
                } else {
                    return '<span class="badge badge-danger">No</span>';
                }
            })
            ->addColumn('reviewed_on', function ($project) {
                if ($project->review) {
                    return $project->review->updated_at->diffForHumans(null, null, true);
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($project) {
                if ($project->review) {
                    if (auth()->user()->can('reviews.create') || auth()->user()->can('projects.review', $project)) {
                        return '<a href="' . route('reviews.edit', ['review' => $project->review->getRouteKey()]) . '" class="btn btn-sm btn-info">Edit</a>';
                    }
                } else {
                    if (auth()->user()->can('reviews.create') || auth()->user()->can('projects.review', $project)) {
                        return '<a href="'. route('reviews.create', ['project' => $project->getRouteKey()]).'" class="btn btn-sm btn-info">Create</a>';
                    }
                }
            })
            ->rawColumns(['title','reviewed','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->with('review','pap_type','creator.office','creator.roles','creator.permissions')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('reviewsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('title'),
            Column::make('office')
                ->addClass('text-center'),
            Column::make('pap_type')
                ->addClass('text-center'),
            Column::make('reviewed')
                ->addClass('text-center'),
            Column::make('reviewed_on')
                ->addClass('text-center'),
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
        return 'Reviews_' . date('YmdHis');
    }
}
