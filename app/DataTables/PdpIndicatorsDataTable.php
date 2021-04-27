<?php

namespace App\DataTables;

use App\Models\PdpIndicator;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PdpIndicatorsDataTable extends DataTable
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
            ->addColumn('parent', function($pdpIndicator) {
                return $pdpIndicator->parent->name ?? '';
            })
            ->addColumn('action', function ($pdpIndicator) {
                return '
                    <a href="'.route('admin.pdp_indicators.edit', $pdpIndicator->id).'" class="btn btn-secondary">Edit</a>
                ';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PdpIndicator $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PdpIndicator $model)
    {
        return $model->with('parent')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('pdpindicators-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'ASC')
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
            Column::make('id')
                ->addClass('text-center')
                ->width('10%'),
            Column::make('name')
                ->width('35%'),
            Column::make('parent')
                ->width('35%'),
            Column::make('level')
                ->addClass('text-center')
                ->width('10%'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('10%')
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
        return 'PdpIndicators_' . date('YmdHis');
    }
}
