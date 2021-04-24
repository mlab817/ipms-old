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
                'name'          => 'Feasibility Study',
                'slug'          => Str::slug('Feasibility Study'),
                'description'   => '',
            ],
            [
                'id'            => 2,
                'name'          => 'Business Case',
                'slug'          => Str::slug('Business Case'),
                'description'   => '',
            ],
            [
                'id'            => 3,
                'name'          => 'Project Proposal',
                'slug'          => Str::slug('Project Proposal'),
                'description'   => '',
            ],
            [
                'id'            => 4,
                'name'          => 'Concept Note',
                'slug'          => Str::slug('Concept Note'),
                'description'   => '',
            ],
            [
                'id'            => 5,
                'name'          => 'Others',
                'slug'          => Str::slug('Others'),
                'description'   => '',
            ],
            [
                'id'            => 6,
                'name'          => 'Not Applicable',
                'slug'          => Str::slug('Not Applicable'),
                'description'   => '',
            ],
        ];

        DB::table('preparation_documents')->insert($seeds);
    }
}
