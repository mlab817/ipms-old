<?php

namespace Database\Seeders;

use App\Models\Checklist;
use Illuminate\Database\Seeder;

class ChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'          => 'Title is provided',
                'description'   => '',
            ],
            [
                'name'          => 'PAP Type is selected',
                'description'   => '',
            ],
            [
                'name'          => 'Basis for implementation is selected',
                'description'   => '',
            ],
            [
                'name'          => 'Description is provided',
                'description'   => '',
            ],
            [
                'name'          => 'Expected outputs is provided',
                'description'   => '',
            ],
            [
                'name'          => 'Total Project Cost is provided and consistent with breakdown',
                'description'   => '',
            ],
            [
                'name'          => 'Spatial Coverage is selected',
                'description'   => '',
            ],
            [
                'name'          => 'Regions are properly selected',
                'description'   => '',
            ],
            [
                'name'          => 'Implementation period is provided',
                'description'   => '',
            ],
            [
                'name'          => 'ICCable fields are complied',
                'description'   => '',
            ],
            [
                'name'          => 'RDIP fields are complied',
                'description'   => '',
            ],
            [
                'name'          => 'Preparation details are complete',
                'description'   => '',
            ],
            [
                'name'          => 'Generated employment is provided',
                'description'   => '',
            ],
            [
                'name'          => 'PDP information supplied',
                'description'   => '',
            ],
            [
                'name'          => 'SDGs are selected',
                'description'   => '',
            ],
            [
                'name'          => 'Ten point agenda are selected',
                'description'   => '',
            ],
            [
                'name'          => 'Financial information are complete',
                'description'   => '',
            ],
            [
                'name'          => 'Updates are provided',
                'description'   => '',
            ],
            [
                'name'          => 'Breakdown of funding source is provided',
                'description'   => '',
            ],
            [
                'name'          => 'Breakdown by region is provided',
                'description'   => '',
            ],
            [
                'name'          => 'TRIP information are provided',
                'description'   => '',
            ],
            [
                'name'          => 'TRIP breakdown of funding source are provided',
                'description'   => '',
            ],
            [
                'name'          => 'TRIP breakdown of region are provided',
                'description'   => '',
            ],
            [
                'name'          => 'Financial Accomplishments are provided',
                'description'   => '',
            ],
        ];

        foreach ($data as $checklist) {
            Checklist::create($checklist);
        }
    }
}
