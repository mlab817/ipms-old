<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PreparationDocumentsTableSeeder extends Seeder
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
                'id'            => 1,
                'uuid'          => Str::uuid(),
                'name'          => 'Feasibility Study',
                'slug'          => Str::slug('Feasibility Study'),
                'description'   => '',
            ],
            [
                'id'            => 2,
                'uuid'          => Str::uuid(),
                'name'          => 'Business Case',
                'slug'          => Str::slug('Business Case'),
                'description'   => '',
            ],
            [
                'id'            => 3,
                'uuid'          => Str::uuid(),
                'name'          => 'Project Proposal',
                'slug'          => Str::slug('Project Proposal'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'uuid'          => Str::uuid(),
                'name'          => 'Concept Note',
                'slug'          => Str::slug('Concept Note'),
                'description'   => '',
            ],
            [
                'id'            => 5,
                'uuid'          => Str::uuid(),
                'name'          => 'Others',
                'slug'          => Str::slug('Others'),
                'description'   => '',
            ],
            [
                'id'            => 6,
                'uuid'          => Str::uuid(),
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => '',
            ],
        ];

        DB::table('preparation_documents')->insert($seeds);
    }
}
