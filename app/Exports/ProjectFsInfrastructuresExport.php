<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectFsInfrastructuresExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Project::query()->with('fs_infrastructures.funding_source');
    }

    public function map($row): array
    {
        $rows = [];

        foreach ($row->fs_infrastructures as $fsInvestment) {
            array_push($rows, [
                $row->title,
                $fsInvestment->funding_source->name ?? '',
                $fsInvestment->y2016,
                $fsInvestment->y2017,
                $fsInvestment->y2018,
                $fsInvestment->y2019,
                $fsInvestment->y2020,
                $fsInvestment->y2021,
                $fsInvestment->y2022,
                $fsInvestment->y2023,
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
            'Funding Source',
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
