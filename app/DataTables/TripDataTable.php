<?php

namespace App\DataTables;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TripDataTable extends DataTable
{
    /**
     * @param $query
     * @return DataTableAbstract|\Yajra\DataTables\QueryDataTable
     */
    public function dataTable($query)
    {
        return datatables()->eloquent($query);
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
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
                    ->setTableId('trip-table')
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
    protected function getColumns(): array
    {
        return [
            Column::make('title'),
            Column::make('description'),
            Column::make('expected_outputs'),
//            Column::make('spatial_coverage'),
//            Column::make('regions'),
            Column::make('target_start_year'),
            Column::make('target_end_year'),
//            Column::make('tier'),
//            Column::make('implementation_mode'),
//            Column::make('y2022'),
//            Column::make('y2023'),
//            Column::make('y2024'),
            Column::make('total_project_cost'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Trip_' . date('YmdHis');
    }
}
