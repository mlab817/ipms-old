<?php

namespace App\DataTables;

use App\DataTables\Scopes\AssignedProjectsDataTableScope;
use App\Models\Project;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AssignedProjectsDataTable extends DataTable
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
            ->addColumn('office', function ($row) {
                return $row->office->name ?? '';
            })
            ->addColumn('owner', function ($row) {
                $avatar = '<img src="'. $row->creator->avatar .'" alt="avatar" class="table-avatar img-circle" width="40" height="40"><br/>';
                return $avatar . '<small class="text-muted">' . $row->creator->name . '</small>' ?? '';
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans(null, null, true);
            })
            ->addColumn('action', function ($row) {
                // get pivot
                $permissions = $row->users()->find(auth()->id())->pivot;
                // create buttons
                $buttons = '';
                if ($permissions->read) {
                    $buttons .= '<a href="' . route('projects.show', $row) . '" class="btn-sm btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        View
                    </a>';
                }
                if ($permissions->update) {
                    $buttons .= '<a href="' . route('projects.edit', $row) . '" class="btn-secondary btn-sm ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                        Edit
                    </a>';
                }
//                if ($permissions->delete) {}
                if ($permissions->review) {
                    $buttons .= '<a href="' . route('reviews.create', $row) . '" class="btn-info btn-sm ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-xs" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z" />
                              <path fill-rule="evenodd" d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                        </svg>
                        Review
                    </a>';
                }
//                if ($permissions->comment) {}
                return $buttons;
            })
            ->rawColumns(['owner','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('assignedprojectsdatatable-table')
                    ->parameters(['responsive' => true])
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
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
            Column::make('title')
                ->addClass('text-center'),
            Column::make('office')
                ->addClass('text-center'),
            Column::make('owner')
                ->addClass('text-center'),
            Column::make('updated_at')
                ->addClass('text-center'),
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
        return 'AssignedProjects_' . date('YmdHis');
    }
}
