<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PdpChaptersTableSeeder extends Seeder
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
                'id'            => 5,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 5: Ensuring People-Centered, Clean and Efficient Governance',
                'description'   => '',
                'slug'          => Str::slug('Chapter 5: Ensuring People-Centered, Clean and Efficient Governance'),
            ],
            [
                'id'            => 6,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 6: Pursuing Swift and Fair Administration of Values Justice',
                'description'   => '',
                'slug'          => Str::slug('Chapter 6: Pursuing Swift and Fair Administration of Values Justice'),
            ],
            [
                'id'            => 7,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 7: Promoting Philippine Culture and Values',
                'description'   => '',
                'slug'          => Str::slug('Chapter 7: Promoting Philippine Culture and Values'),
            ],
            [
                'id'            => 8,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 8: Expanding Economic Opportunities in Agriculture, Forestry and Fisheries',
                'description'   => '',
                'slug'          => Str::slug('Chapter 8: Expanding Economic Opportunities in Agriculture, Forestry and Fisheries'),
            ],
            [
                'id'            => 9,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 9: Expanding Economic Opportunities in Industry and Services',
                'description'   => '',
                'slug'          => Str::slug('Chapter 9: Expanding Economic Opportunities in Industry and Services'),
            ],
            [
                'id'            => 10,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 10: Accelerating Human Capital Development',
                'description'   => '',
                'slug'          => Str::slug('Chapter 10: Accelerating Human Capital Development'),
            ],
            [
                'id'            => 11,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 11: Reducing Vulnerability of Individuals and Families',
                'description'   => '',
                'slug'          => Str::slug('Chapter 11: Reducing Vulnerability of Individuals and Families'),
            ],
            [
                'id'            => 12,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 12: Building Safe and Secure Communities',
                'description'   => '',
                'slug'          => Str::slug('Chapter 12: Building Safe and Secure Communities'),
            ],
            [
                'id'            => 13,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 13: Reaching for the Demographic Dividend',
                'description'   => '',
                'slug'          => Str::slug('Chapter 13: Reaching for the Demographic Dividend'),
            ],
            [
                'id'            => 14,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 14: Vigorously Advancing Science, Technology, and Innovation',
                'description'   => '',
                'slug'          => Str::slug('Chapter 14: Vigorously Advancing Science, Technology, and Innovation'),
            ],
            [
                'id'            => 15,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 15: Ensuring Sound Macroeconomic Policy',
                'description'   => '',
                'slug'          => Str::slug('Chapter 15: Ensuring Sound Macroeconomic Policy'),
            ],
            [
                'id'            => 16,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 16: Formulating the Framework for National Competition Policy',
                'description'   => '',
                'slug'          => Str::slug('Chapter 16: Formulating the Framework for National Competition Policy'),
            ],
            [
                'id'            => 17,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 17: Attaining Just and Lasting Peace',
                'description'   => '',
                'slug'          => Str::slug('Chapter 17: Attaining Just and Lasting Peace'),
            ],
            [
                'id'            => 18,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 18: Ensuring Security, Public Order, and Safety',
                'description'   => '',
                'slug'          => Str::slug('Chapter 18: Ensuring Security, Public Order, and Safety'),
            ],
            [
                'id'            => 19,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 19: Accelerating Strategic Infrastructure Development',
                'description'   => '',
                'slug'          => Str::slug('Chapter 19: Accelerating Strategic Infrastructure Development'),
            ],
            [
                'id'            => 20,
                'uuid'          => Str::uuid(),
                'name'          => 'Chapter 20: Ensuring Ecological Integrity, Clean and Healthy Environment',
                'description'   => '',
                'slug'          => Str::slug('Chapter 20: Ensuring Ecological Integrity, Clean and Healthy Environment'),
            ],
            [
                'id'            => 21,
                'uuid'          => Str::uuid(),
                'name'          => 'Administrative Building',
                'description'   => '',
                'slug'          => Str::slug('Administrative Building'),
            ],
            [
                'id'            => 99,
                'uuid'          => Str::uuid(),
                'name'          => 'No Chapter',
                'description'   => '',
                'slug'          => Str::slug('No Chapter'),
            ],
        ];

        DB::table('pdp_chapters')->insert($seeds);
    }
}
