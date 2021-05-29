<?php

namespace App\Http\Controllers;

use App\Exports\ProjectFsInfrastructuresExport;
use App\Exports\ProjectFsInvestmentsExport;
use App\Exports\ProjectRegionExport;
use App\Exports\ProjectRegionInvestmentsExport;
use App\Exports\ProjectSdgExport;
use App\Exports\ProjectsExport;
use App\Exports\ProjectTpaExport;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $links = [
            [
                'title' => 'Project Summary',
                'desc'  => 'Contains title, office, pap type, project status, spatial coverage, target start year, target end year, main pdp chapter, funding source, implementation mode, budget tier, and total project cost',
                'link'  => route('exports.projects'),
            ],
            [
                'title' => 'Project SDGs',
                'desc'  => 'Contains project title and SDGs that the PAP contribute to',
                'link'  => route('exports.sdgs'),
            ],
            [
                'title' => 'Project-Ten Point Agenda',
                'desc'  => 'Contains project title and 0+10 Socioeconomic agenda that the PAP contribute to',
                'link'  => route('exports.ten_point_agendas'),
            ],
            [
                'title' => 'Project-Regions',
                'desc'  => 'Contains project title and all covered regions by the project',
                'link'  => route('exports.ten_point_agendas'),
            ],
            [
                'title' => 'Project-Regional Investments',
                'desc'  => 'Contains project title and regional investments by year',
                'link'  => route('exports.region_investments'),
            ],
            [
                'title' => 'Project-Funding Source Investments',
                'desc'  => 'Contains project title and investments by funding source and by year',
                'link'  => route('exports.fs_investments'),
            ],
            [
                'title' => 'Project-Funding Source Infrastructures',
                'desc'  => 'Contains project title and infrastructure investments by funding source and by year',
                'link'  => route('exports.fs_infrastructures'),
            ],
        ];

        return view('exports.index', compact('links'));
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function projects(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return (new ProjectsExport)->download('projects.xlsx');
    }

    public function sdgs()
    {
        return (new ProjectSdgExport)->download('project-sdg.xlsx');
    }

    public function ten_point_agendas()
    {
        return (new ProjectTpaExport)->download('project-ten-point-agenda.xlsx');
    }

    public function regions()
    {
        return (new ProjectRegionExport)->download('project-region.xlsx');
    }

    public function region_investments()
    {
        return (new ProjectRegionInvestmentsExport)->download('regional-investments.xlsx');
    }

    public function fs_investments()
    {
        return (new ProjectFsInvestmentsExport)->download('funding-source-investments.xlsx');
    }

    public function fs_infrastructures()
    {
        return (new ProjectFsInfrastructuresExport)->download('funding-source-infrastructures.xlsx');
    }
}
