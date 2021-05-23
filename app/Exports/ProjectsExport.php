<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Project::query();
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->title,
            $row->office->acronym ?? '',
            $row->pap_type->name ?? '',
            $row->project_status->name ?? '',
            $row->spatial_coverage->name ?? '',
            $row->target_start_year,
            $row->target_end_year,
            $row->pdp_chapter->name ?? '',
            $row->funding_source->name ?? '',
            $row->implementation_mode->name ?? '',
            $row->tier->name ?? '',
            $row->total_project_cost,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Title',
            'Office',
            'PAP Type',
            'Project Status',
            'Spatial Coverage',
            'Implementation Start',
            'Implementation End',
            'Main PDP Chapter',
            'Main Funding Source',
            'Implementation Mode',
            'Budget Tier',
            'Total Project Cost (PhP)',
        ];
    }
}
