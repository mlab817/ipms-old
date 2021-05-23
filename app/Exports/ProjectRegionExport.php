<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectRegionExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * @return Builder
     */
    public function query()
    {
        return Project::query()->with('regions');
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        $rows = [];

        foreach ($row->regions as $region) {
            array_push($rows, [
                $row->title,
                $region->name,
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
            'Project Title',
            'Region',
        ];
    }
}
