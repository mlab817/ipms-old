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
                'name'                      => 'Social Infrastructure',
                'slug'                      => Str::slug('Social Infrastructure'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 11,
                        'name'          => 'Health',
                        'slug'          => Str::slug('Health'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 12,
                        'name'          => 'Education',
                        'slug'          => Str::slug('Education'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 13,
                        'name'          => 'Solid Waste Management',
                        'slug'          => Str::slug('Solid Waste Management'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 14,
                        'name'          => 'Housing',
                        'slug'          => Str::slug('Housing'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 15,
                        'name'          => 'Public Safety/Security',
                        'slug'          => Str::slug('Public Safety/Security'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'id'                        => 2,
                'name'                      => 'Power - Electrification',
                'slug'                      => Str::slug('Power - Electrification'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
            [
                'id'                        => 3,
                'name'                      => 'Transportation',
                'slug'                      => Str::slug('Transportation'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 31,
                        'name'          => 'Roads and Bridges',
                        'slug'          => Str::slug('Roads and Bridges'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 32,
                        'name'          => 'Water Transportation',
                        'slug'          => Str::slug('Water Transportation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 33,
                        'name'          => 'Air Transportation',
                        'slug'          => Str::slug('Air Transportation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 34,
                        'name'          => 'Rail Transportation',
                        'slug'          => Str::slug('Rail Transportation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 35,
                        'name'          => 'Urban Transportation',
                        'slug'          => Str::slug('Urban Transportation'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'id'                        => 4,
                'name'                      => 'Water Resources',
                'slug'                      => Str::slug('Water Resources'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 41,
                        'name'          => 'Irrigation',
                        'slug'          => Str::slug('Irrigation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 42,
                        'name'          => 'Water Supply',
                        'slug'          => Str::slug('Water Supply'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 43,
                        'name'          => 'Flood Management',
                        'slug'          => Str::slug('Flood Management'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 44,
                        'name'          => 'Sanitation/Sewerage/Septage',
                        'slug'          => Str::slug('Sanitation/Sewerage/Septage'),
                        'description'   => '',
                    ],
                ],
            ],
            [
                'id'                        => 5,
                'name'                      => 'Information and Communications Technology',
                'slug'                      => Str::slug('Information and Communications Technology'),
                'description'               => '',
                'infrastructure_subsectors' => [],
            ],
            [
                'id'                        => 6,
                'name'                      => 'Others',
                'slug'                      => Str::slug('Others'),
                'description'               => '',
                'infrastructure_subsectors' => [
                    [
                        'id'            => 61,
                        'name'          => 'Urban/Heritage Renewal',
                        'slug'          => Str::slug('Urban/Heritage Renewal'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 62,
                        'name'          => 'Reclamation',
                        'slug'          => Str::slug('Reclamation'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 63,
                        'name'          => 'Government Building',
                        'slug'          => Str::slug('Government Building'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 64,
                        'name'          => 'Multipurpose Facilities',
                        'slug'          => Str::slug('Multipurpose Facilities'),
                        'description'   => '',
                    ],
                    [
                        'id'            => 65,
                        'name'          => 'Others',
                        'slug'          => Str::slug('Others'),
                        'description'   => '',
                    ],
                ],
            ],
        ];

        foreach ($seeds as $seed) {
            $is = InfrastructureSector::withoutEvents(function () use ($seed) {
                return InfrastructureSector::create([
                    'id'            => $seed['id'],
                    'name'          => $seed['name'],
                    'slug'          => $seed['slug'],
                    'description'   => $seed['description'],

                ]);
            });

            foreach ($seed['infrastructure_subsectors'] as $seed2) {
                \DB::table('infrastructure_subsectors')->insert([
                    array_merge(['infrastructure_sector_id' => $is->id], $seed2)
                ]);
            }
        }
    }
}
