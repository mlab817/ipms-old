<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectTpaExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    /**
     * @return Builder
     */
    public function query()
    {
        return Project::query()->with('ten_point_agendas');
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        $rows = [];

        foreach ($row->ten_point_agendas as $tpa) {
            array_push($rows, [
                $row->title,
                $tpa->name,
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
            'Ten Point Agenda',
        ];
    }
}
