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
            ->addColumn('pap_type', function ($project) {
                $papType = $project->pap_type->name ?? '';
                return '<span class="badge badge-'. ($papType == 'Project' ? 'success' : 'danger').' ">'. $papType.'</span>';
            })
            ->addColumn('added_by', function ($project) {
                return ($project->creator ? $project->creator->name : '')
                    . '<br/><small class="text-muted">'
                    . !!$project->created_at ? $project->created_at->diffForHumans(null, null, true) : ''
                    . '</small>';
            })
            ->addColumn('office', function ($row) {
                return $row->office->acronym ?? '';
            })
            ->addColumn('reviewed', function($project) {
                if ($project->review()->exists()) {
                    return '<span class="badge badge-success">Yes</span>';
                } else {
                    return '<span class="badge badge-danger">No</span>';
                }
            })
            ->addColumn('pip', function($row) {
                if ($row->review) {
                    return $row->review->pip
                        ? '
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        '
                        : '
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-danger" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        ';
                }
            })
            ->addColumn('trip', function ($row) {
                if ($row->review) {
                    return $row->review->trip
                        ? '
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-success" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        '
                        : '
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm text-info" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        ';
                }
            })
            ->addColumn('reviewed_details', function ($project) {
                if ($project->review) {
                    $reviewer = $project->review->user->name ?? '';
                    return $reviewer
                        . '<br/><small class="text-muted">'
                        . $project->review->updated_at->diffForHumans(null, null, true)
                        . '</small>';
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($project) {
                // ProjectPolicy::review()
                if (auth()->user()->can('review', $project)) {
                    if ($project->review) {
                        return '<a href="' . route('reviews.edit', ['review' => $project->review]) . '" class="btn btn-sm btn-secondary">Edit</a>';
                    } else {
                        return '<a href="'. route('reviews.create', ['project' => $project]).'" class="btn btn-sm btn-info">Create</a>';
                    }
                }
            })
            ->addColumn('view', function ($project) {
                if ($project->review && auth()->user()->can('view', $project->review)) {
                    return '<a href="' . route('reviews.show', $project->review) .'" class="btn btn-success btn-sm">View</a>';
                }
            })
            ->rawColumns(['added_by','pip','trip','pap_type','reviewed','reviewed_details','action','view']);
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
                    ->parameters([
                        'processing'    => true,
                        'serverSide'    => true,
                        'responsive' => true,
                        'sPaginationType' => 'full_numbers',
                        'order' => [[0, 'asc']],
                        "lengthMenu" => [[10, 25, 50], [10, 25, 50]]
                    ])
                    ->columns($this->getColumns())
                    ->minifiedAjax()
//                    ->dom('Bfrtip')
                    ->orderBy(0);
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
            Column::make('title')
                ->addClass('text-sm'),
            Column::make('added_by')
                ->addClass('text-sm text-center'),
            Column::make('office')
                ->addClass('text-sm text-center'),
            Column::make('pap_type')
                ->addClass('text-sm text-center'),
            Column::make('reviewed')
                ->addClass('text-sm text-center'),
            Column::make('pip')
                ->addClass('text-sm text-center'),
            Column::make('trip')
                ->addClass('text-sm text-center'),
            Column::make('reviewed_details')
                ->addClass('text-sm text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('view')
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
