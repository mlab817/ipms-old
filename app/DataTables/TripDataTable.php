<?php

namespace App\DataTables;

use App\Models\Trip;
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
    public function dataTable($query)
    {
        return datatables()
            ->query($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function query(): \Illuminate\Database\Query\Builder
    {
        return DB::table('projects')
            ->leftJoin('spatial_coverages','projects.spatial_coverage_id','=','spatial_coverages.id')
            ->leftJoin('offices','projects.office_id','=','offices.id')
            ->leftJoin('tiers','projects.tier_id','=','tiers.id')
            ->leftJoin('implementation_modes','projects.implementation_mode_id','=','implementation_modes.id')
            ->leftJoin('fs_investments','projects.id','=','fs_investments.project_id')
            ->leftJoin('project_region','projects.id','=','project_region.project_id')
            ->leftJoin('regions','project_region.region_id','=','regions.id')
            ->selectRaw('projects.title, projects.description, projects.expected_outputs, projects.target_start_year, projects.target_end_year')
            ->selectRaw('offices.name AS office')
            ->selectRaw('spatial_coverages.name AS spatial_coverage')
            ->selectRaw('GROUP_CONCAT(regions.label) AS regions')
            ->selectRaw('tiers.name AS tier')
            ->selectRaw('implementation_modes.name AS implementation_mode')
            ->selectRaw('sum(fs_investments.y2022) AS y2022')
            ->selectRaw('sum(fs_investments.y2023) AS y2023')
            ->selectRaw('sum(fs_investments.y2024) AS y2024')
            ->selectRaw('sum(
                        fs_investments.y2016 +
                        fs_investments.y2017 +
                        fs_investments.y2018 +
                        fs_investments.y2019 +
                        fs_investments.y2020 +
                        fs_investments.y2021 +
                        fs_investments.y2022 +
                        fs_investments.y2023 +
                        fs_investments.y2024 +
                        fs_investments.y2025
                    ) AS total_project_cost
                ')
            ->where('projects.trip',true)
            ->groupBy('projects.id');
    }

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
            Column::make('spatial_coverage'),
            Column::make('regions'),
            Column::make('target_start_year'),
            Column::make('target_end_year'),
            Column::make('tier'),
            Column::make('implementation_mode'),
            Column::make('y2022'),
            Column::make('y2023'),
            Column::make('y2024'),
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
