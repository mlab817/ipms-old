<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TenPointAgendasTableSeeder extends Seeder
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
                'name'          => 'Macroeconomic Policies',
                'slug'          => Str::slug('Macroeconomic Policies'),
                'description'   => 'Continue and maintain the current macroeconomic policies, including fiscal, monetary and trade polic',
            ],
            [
                'id'            => 2,
                'name'          => 'Tax Reform',
                'slug'          => Str::slug('Tax Reform'),
                'description'   => 'Institute progressive tax reform and more effective tax collection, indexing taxes to inflation. A tax reform package will be submitted to Congress by September 2016.',
            ],
            [
                'id'            => 3,
                'name'          => 'Infrastructure',
                'slug'          => Str::slug('Infrastructure'),
                'description'   => 'Accelerate annual infrastructure spending to account for 5% of GDP, with Public-Private Partnerships playing a key role.',
            ],
            [
                'id'            => 4,
                'name'          => 'Constitutional Amendment',
                'slug'          => Str::slug('Constitutional Amendment'),
                'description'   => 'Increase competitiveness and the ease of doing business. This effort will draw upon successful models used to attract business to local cities (e.g., Davao), and pursue the relaxation of the Constitutional restrictions on foreign ownership, except as regards land ownership, in order to attract forei',
            ],
            [
                'id'            => 5,
                'name'          => 'Agriculture',
                'slug'          => Str::slug('Agriculture'),
                'description'   => 'Promote rural and value chain development toward increasing agricultural and rural enterprise productivity and rural tourism.',
            ],
            [
                'id'            => 6,
                'name'          => 'Land Reform',
                'slug'          => Str::slug('Land Reform'),
                'description'   => 'Ensure security of land tenure to encourage investments, and address bottlenecks in land management and titling agencies.',
            ],
            [
                'id'            => 7,
                'name'          => 'Basic Education',
                'slug'          => Str::slug('Basic Education'),
                'description'   => 'Invest in human capital development, including health and education systems, and match skills and training to meet the demand of businesses and the private sector.',
            ],
            [
                'id'            => 8,
                'name'          => 'Innovation in Science, Technology and the Arts',
                'slug'          => Str::slug('Innovation in Science, Technology and the Arts'),
                'description'   => 'Promote science, technology, and the creative arts to enhance innovation and creative capacity towards self-sustaining, inclusive development.',
            ],
            [
                'id'            => 9,
                'name'          => 'Conditional Cash Transfer Program',
                'slug'          => Str::slug('Conditional Cash Transfer Program'),
                'description'   => 'Improve social protection programs, including the government\'s Conditional Cash Transfer program, to protect the poor against instability and economic shocks.',
            ],
            [
                'id'            => 10,
                'name'          => 'Responsible Parenthood and Reproductive Health Law',
                'slug'          => Str::slug('Responsible Parenthood and Reproductive Health Law'),
                'description'   => 'Strengthen implementation of the Responsible Parenthood and Reproductive Health Law to enable especially poor couples to make informed choices on financial and family planning.',
            ],
            [
                'id'            => 11,
                'name'          => 'Peace and Order',
                'slug'          => Str::slug('Peace and Order'),
                'description'   => 'Peace and Order',
            ],
        ];

        DB::table('ten_point_agendas')->insert($seeds);
    }
}
