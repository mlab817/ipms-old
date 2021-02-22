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
                'id'                        => 1,
                'uuid'                      => Str::uuid(),
                'name'                      => 'Social Infrastructure',
                'slug'                      => Str::slug('Social Infrastructure'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 11,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Health',
                        'slug'          => Str::slug('Health'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 12,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Education',
                        'slug'          => Str::slug('Education'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 13,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Solid Waste Management',
                        'slug'          => Str::slug('Solid Waste Management'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 14,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Housing',
                        'slug'          => Str::slug('Housing'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 15,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Public Safety/Security',
                        'slug'          => Str::slug('Public Safety/Security'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'id'                        => 2,
                'uuid'                      => Str::uuid(),
                'name'                      => 'Power - Electrification',
                'slug'                      => Str::slug('Power - Electrification'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
            [
                'id'                        => 3,
                'uuid'                      => Str::uuid(),
                'name'                      => 'Transportation',
                'slug'                      => Str::slug('Transportation'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 31,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Roads and Bridges',
                        'slug'          => Str::slug('Roads and Bridges'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 32,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Water Transportation',
                        'slug'          => Str::slug('Water Transportation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 33,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Air Transportation',
                        'slug'          => Str::slug('Air Transportation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 34,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Rail Transportation',
                        'slug'          => Str::slug('Rail Transportation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 35,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Urban Transportation',
                        'slug'          => Str::slug('Urban Transportation'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'id'                        => 4,
                'uuid'                      => Str::uuid(),
                'name'                      => 'Water Resources',
                'slug'                      => Str::slug('Water Resources'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 41,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Irrigation',
                        'slug'          => Str::slug('Irrigation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 42,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Water Supply',
                        'slug'          => Str::slug('Water Supply'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 43,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Flood Management',
                        'slug'          => Str::slug('Flood Management'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 44,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Sanitation/Sewerage/Septage',
                        'slug'          => Str::slug('Sanitation/Sewerage/Septage'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'id'                        => 5,
                'uuid'                      => Str::uuid(),
                'name'                      => 'Information and Communications Technology',
                'slug'                      => Str::slug('Information and Communications Technology'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
            [
                'id'                        => 6,
                'uuid'                      => Str::uuid(),
                'name'                      => 'Others',
                'slug'                      => Str::slug('Others'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 61,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Urban/Heritage Renewal',
                        'slug'          => Str::slug('Urban/Heritage Renewal'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 62,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Reclamation',
                        'slug'          => Str::slug('Reclamation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 63,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Government Building',
                        'slug'          => Str::slug('Government Building'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 64,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Multipurpose Facilities',
                        'slug'          => Str::slug('Multipurpose Facilities'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 65,
                        'uuid'          => Str::uuid(),
                        'name'          => 'Others',
                        'slug'          => Str::slug('Others'),
                        'description'   => '',
                    ],
                ],
            ],
        ];

        foreach ($seeds as $seed) {
            $is                 = new InfrastructureSector;
            $is->uuid           = $seed['uuid'];
            $is->name           = $seed['name'];
            $is->slug           = $seed['slug'];
            $is->description    = $seed['description'];
            $is->save();

            $is->infrastructure_subsectors()->createMany($seed['infrastructure_subsectors']);
        }
    }
}
