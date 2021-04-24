<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SdgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sdgs = [
            [
                'id'            => 1,
                'name'          => 'No Poverty',
                'description'   => 'End poverty in all its forms everywhere',
            ],
            [
                'id'            => 2,
                'name'          => 'Zero Hunger',
                'description'   => 'End hunger, achieve food security and improved nutrition and promote sustainable agriculture',
            ],
            [
                'id'            => 3,
                'name'          => 'Good Health and Well-Being',
                'description'   => 'Ensure healthy lives and promote well-being for all at all ages',
            ],
            [
                'id'            => 4,
                'name'          => 'Quality Education',
                'description'   => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all',
            ],
            [
                'id'            => 5,
                'name'          => 'Gender Equality',
                'description'   => 'Achieve gender equality and empower all women and girls',
            ],
            [
                'id'            => 6,
                'name'          => 'Clean Water and Sanitation',
                'description'   => 'Ensure availability and sustainable management of water and sanitation for all',
            ],
            [
                'id'            => 7,
                'name'          => 'Affordable and Clean Energy',
                'description'   => 'Ensure access to affordable, reliable, sustainable and modern energy for all',
            ],
            [
                'id'            => 8,
                'name'          => 'Decent Work and Economic Growth',
                'description'   => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all',
            ],
            [
                'id'            => 9,
                'name'          => 'Industy, Innovation and Infrastructure',
                'description'   => 'Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation',
            ],
            [
                'id'            => 10,
                'name'          => 'Reduced Inequalities',
                'description'   => 'Reduce inequality within and among countries',
            ],
            [
                'id'            => 11,
                'name'          => 'Sustainable Cities and Communities',
                'description'   => 'Make cities and human settlements inclusive, safe, resilient and sustainable',
            ],
            [
                'id'            => 12,
                'name'          => 'Responsible Consumption and Production',
                'description'   => 'Ensure sustainable consumption and production patterns',
            ],
            [
                'id'            => 13,
                'name'          => 'Climate Action',
                'description'   => 'Take urgent action to combat climate change and its impacts',
            ],
            [
                'id'            => 14,
                'name'          => 'Life Below Water',
                'description'   => 'Conserve and sustainably use the oceans, seas and marine resources for sustainable development',
            ],
            [
                'id'            => 15,
                'name'          => 'Life on Land',
                'description'   => 'Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss',
            ],
            [
                'id'            => 16,
                'name'          => 'Peace, Justice and Strong Institutions',
                'description'   => 'Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels',
            ],
            [
                'id'            => 17,
                'name'          => 'Partnerships for the Goals',
                'description'   => 'Strengthen the means of implementation and revitalize the global partnership for sustainable development',
            ],
        ];

        foreach ($sdgs as $sdg) {
            DB::table('sdgs')->insert([
                'id'            => $sdg['id'],
                'name'          => $sdg['name'],
                'slug'          => Str::slug($sdg['name']),
                'description'   => $sdg['description'],
            ]);
        }
    }
}
