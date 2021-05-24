<?php

namespace App\DataTables;

use App\Models\AuditLog;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuditLogsDataTable extends DataTable
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
            ->addColumn('description', function ($row) {
                $color = '';
                $desc = $row->description;
                if ($desc == 'created') {
                    $color = 'success';
                } else if ($desc == 'updated') {
                    $color = 'primary';
                } else if ($desc == 'deleted') {
                    $color = 'danger';
                }
                return "<span class=\"badge badge-{$color}\">$desc</span>";
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="'. route('audit_logs.show', $row).'" class="btn btn-sm btn-info">View</a>
                ';
            })
            ->rawColumns(['description','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AuditLog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AuditLog $model)
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
                    ->setTableId('auditlogs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'desc')
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
            Column::make('id')
                ->addClass('text-sm text-center'),
            Column::make('description')
                ->addClass('text-sm text-center'),
            Column::make('auditable_type')
                ->addClass('text-sm text-center'),
            Column::make('auditable_id')
                ->addClass('text-sm text-center'),
            Column::make('user_id')
                ->addClass('text-sm text-center'),
            Column::make('host')
                ->addClass('text-sm text-center'),
            Column::make('created_at')
                ->addClass('text-sm text-center'),
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
        return 'AuditLogs_' . date('YmdHis');
    }
}
