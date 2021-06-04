<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectsFullExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Project::query();
    }

    public function map($row): array
    {
        $mapped = [
            $row->title,
            $row->pap_type->name ?? '',
            $row->description,
            $row->spatial_coverage->name ?? '',
            $row->pdp_chapter->name ?? '',
        ];
        dd($mapped);
        return $row;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'title',
            'prog_project',
            'description',
            'spatial',
            'main_pdp_chapter',
        ];
    }
}
