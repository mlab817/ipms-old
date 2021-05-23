<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectSdgExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    /**
     * @return Builder
     */
    public function query()
    {
        return Project::query()->with('sdgs');
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        $rows = [];

        foreach ($row->sdgs as $sdg) {
            array_push($rows, [
                $row->title,
                $sdg->name,
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
            'SDG',
        ];
    }
}
