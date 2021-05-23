<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectRegionInvestmentsExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Project::query()->with('region_investments.region');
    }

    public function map($row): array
    {
        $rows = [];

        foreach ($row->region_investments as $regionInvestment) {
            array_push($rows, [
                $row->title,
                $regionInvestment->region->label ?? '',
                $regionInvestment->y2016,
                $regionInvestment->y2017,
                $regionInvestment->y2018,
                $regionInvestment->y2019,
                $regionInvestment->y2020,
                $regionInvestment->y2021,
                $regionInvestment->y2022,
                $regionInvestment->y2023,
            ]);
        }

        return $rows;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Title',
            'Region',
            '2016',
            '2017',
            '2018',
            '2019',
            '2020',
            '2021',
            '2022',
            '2023',
        ];
    }
}
