<?php

namespace App\DataTables;

use App\Models\OperatingUnit;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OperatingUnitsDataTable extends DataTable
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
            ->addColumn('type', function ($row) {
                if ($row->operating_unit_type->exists()) {
                    return $row->operating_unit_type->name;
                } else {
                    return '';
                }
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . $row->thumb . '" alt="ou" class="img-circle" height="40" width="40">';
            })
            ->addColumn('action', function($row) {
                return '
                    <a href="'. route('admin.operating_units.edit', $row->slug) .'" class="btn btn-info btn-sm">Edit</a>
                ';
            })
            ->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OperatingUnit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OperatingUnit $model)
    {
        return $model->with('operating_unit_type')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('operatingunits-table')
                    ->columns($this->getColumns())
                    ->parameters(['responsive' => true])
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
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
            Column::make('id'),
            Column::make('name'),
            Column::make('type'),
            Column::make('image')
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
        return 'OperatingUnits_' . date('YmdHis');
    }
}
