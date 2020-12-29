<?php

namespace Database\Seeders;

use App\Models\InfrastructureSector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InfrastructureSectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'uuid'                      => Str::uuid(),
                'name'                      => 'Social Infrastructure',
                'slug'                      => Str::slug('Social Infrastructure'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Health',
                        'slug'          => Str::slug('Health'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Education',
                        'slug'          => Str::slug('Education'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Solid Waste Management',
                        'slug'          => Str::slug('Solid Waste Management'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Housing',
                        'slug'          => Str::slug('Housing'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Public Safety/Security',
                        'slug'          => Str::slug('Public Safety/Security'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'uuid'                      => Str::uuid(),
                'name'                      => 'Power - Electrification',
                'slug'                      => Str::slug('Power - Electrification'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
            [
                'uuid'                      => Str::uuid(),
                'name'                      => 'Transportation',
                'slug'                      => Str::slug('Transportation'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Roads and Bridges',
                        'slug'          => Str::slug('Roads and Bridges'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Water Transportation',
                        'slug'          => Str::slug('Water Transportation'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Air Transportation',
                        'slug'          => Str::slug('Air Transportation'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Rail Transportation',
                        'slug'          => Str::slug('Rail Transportation'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Urban Transportation',
                        'slug'          => Str::slug('Urban Transportation'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'uuid'                      => Str::uuid(),
                'name'                      => 'Water Resources',
                'slug'                      => Str::slug('Water Resources'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Irrigation',
                        'slug'          => Str::slug('Irrigation'),
                        'description'   => '',
                    ],

                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Water Supply',
                        'slug'          => Str::slug('Water Supply'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Flood Management',
                        'slug'          => Str::slug('Flood Management'),
                        'description'   => '',
                    ],
                    [
                        'uuid'          => Str::uuid(),
                        'name'          => 'Sanitation/Sewerage/Septage',
                        'slug'          => Str::slug('Sanitation/Sewerage/Septage'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'uuid'                      => Str::uuid(),
                'name'                      => 'Information and Communications Technology',
                'slug'                      => Str::slug('Information and Communications Technology'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
            [
                'uuid'                      => Str::uuid(),
                'name'                      => 'Others',
                'slug'                      => Str::slug('Others'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
        ];

        foreach ($seeds as $seed) {
            $is                 = new InfrastructureSector;
            $is->uuid           = $seed['uuid'];
            $is->name           = $seed['name'];
            $is->slug           = $seed['slug'];
            $is->description    =  $seed['description'];
            $is->save();

            $is->infrastructure_subsectors()->createMany($seed['infrastructure_subsectors']);
        }
    }
}
