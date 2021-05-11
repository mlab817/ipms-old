<?php

namespace App\DataTables;

use App\Models\AdminProject;
use App\Models\Project;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminProjectsDataTable extends DataTable
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
                return $row->creator->office->name ?? '';
            })
            ->addColumn('added by', function ($row) {
                $img = '<img src="' . $row->creator->avatar .'" width="50" height="50">';
                return $img . '<br/><span class="text-muted text-sm">' . $row->creator->name . '</span>' ?? '';
            })
            ->addColumn('users', function ($row) {
                // get all users that have access
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans(null, null, true);
            })
            ->addColumn('action', function ($row) {
                return '
                    <a class="btn btn-info btn-sm" href="'. route('admin.projects.users.index', $row->getRouteKey()) .'">Manage</a>
                ';
            })
            ->rawColumns(['added by','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AdminProject $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model)
    {
        return $model->with('creator.office','users')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('adminprojects-table')
                    ->columns($this->getColumns())
                    ->parameters(['responsive' => true])
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
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
            Column::make('office'),
            Column::make('added by')
                ->addClass('text-center'),
            Column::make('users'),
            Column::make('updated_at')
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
        return 'AdminProjects_' . date('YmdHis');
    }
}
