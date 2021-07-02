<?php

namespace App\Http\Livewire;

use App\Models\PapType;
use Livewire\Component;

class ReportTables extends Component
{
    public $report;

    public $reports = [
        'pap_types',
    ];

    public function getReport()
    {
        if ($this->report == 'pap_types') {

        }
    }

    public function render()
    {
        $items = PapType::withSum('investments','y2016')
            ->withSum('investments','y2017')
            ->withSum('investments','y2018')
            ->withSum('investments','y2019')
            ->withSum('investments','y2020')
            ->withSum('investments','y2021')
            ->withSum('investments','y2022')
            ->withSum('investments','y2023')->get();
        return view('livewire.report-tables', compact('items'));
    }
}
