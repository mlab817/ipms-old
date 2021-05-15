<?php

namespace App\DataTables;

use App\Models\Notification;
use Illuminate\Notifications\DatabaseNotification;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NotificationsDataTable extends DataTable
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
            ->addColumn('sender', function ($row) {
                return $row->data['sender']['name'];
            })
            ->addColumn('message', function ($row) {
                return $row->data['message'];
            })
            ->addColumn('read_at', function ($row) {
                return $row->read_at->diffForHumans(null, null, true) ?? '';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans(null, null, true) ?? '';
            })
            ->addColumn('action', function ($row) {
                return $row->read_at ? '' : '
                    <a href="'. route('notifications.show', $row) .'" class="btn btn-sm btn-info">Read</a>
                ';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Notification $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DatabaseNotification $model)
    {
        return $model->where('notifiable_id', auth()->id())->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('notificationsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
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
//            Column::make('type'),
//            Column::make('notifiable_type'),
//            Column::make('notifiable_id'),
            Column::make('sender'),
            Column::make('message'),
            Column::make('read_at'),
            Column::make('created_at'),
//            Column::make('updated_at'),
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
        return 'Notifications_' . date('YmdHis');
    }
}
