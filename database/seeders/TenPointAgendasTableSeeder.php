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
            'Continue and maintain the current macroeconomic policies, including fiscal, monetary and trade polic',
            'Institute progressive tax reform and more effective tax collection, indexing taxes to inflation. A tax reform package will be submitted to Congress by September 2016.',
            'Increase competitiveness and the ease of doing business. This effort will draw upon successful models used to attract business to local cities (e.g., Davao), and pursue the relaxation of the Constitutional restrictions on foreign ownership, except as regards land ownership, in order to attract forei',
            'Accelerate annual infrastructure spending to account for 5% of GDP, with Public-Private Partnerships playing a key role.',
            'Promote rural and value chain development toward increasing agricultural and rural enterprise productivity and rural tourism.',
            'Ensure security of land tenure to encourage investments, and address bottlenecks in land management and titling agencies.',
            'Invest in human capital development, including health and education systems, and match skills and training to meet the demand of businesses and the private sector.',
            'Promote science, technology, and the creative arts to enhance innovation and creative capacity towards self-sustaining, inclusive development.',
            'Improve social protection programs, including the government\'s Conditional Cash Transfer program, to protect the poor against instability and economic shocks.',
            'Strengthen implementation of the Responsible Parenthood and Reproductive Health Law to enable especially poor couples to make informed choices on financial and family planning.',
            'Peace and Order',
        ];

        foreach ($seeds as $seed) {
            DB::table('ten_point_agendas')->insert([
                'name'  => $seed,
                'uuid'  => Str::uuid(),
                'slug'  => Str::slug($seed),
            ]);
        }
    }
}
