<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OperatingUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ['name'=>'Central Office', 'operating_unit_type_id' => 1 ],
            ['name'=>'ATI - Agricultural Training Institute', 'operating_unit_type_id' => 2 ],
            ['name'=>'BAFS - Bureau of Agricultural and Fisheries Standards', 'operating_unit_type_id' => 2 ],
            ['name'=>'BAI - Bureau of Animal Industry', 'operating_unit_type_id' => 2 ],
            ['name'=>'BAR - Bureau of Agricultural Research', 'operating_unit_type_id' => 2 ],
            ['name'=>'BPI - Bureau of Plant Industry', 'operating_unit_type_id' => 2 ],
            ['name'=>'BSWM - Bureau of Soils and Water Management', 'operating_unit_type_id' => 2 ],
            ['name'=>'BAFE-Bureau of Agricultural and Fisheries Engineering', 'operating_unit_type_id' => 2 ],
            ['name'=>'RFO CAR - Cordillera Administrative Region', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO I - Ilocos Region', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO II - Cagayan Valley', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO III - Central Luzon', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO IVA - CALABARZON', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO IVB - MIMAROPA', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO V - Bicol Region', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO VI - Western Visayas', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO VII - Central Visayas', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO VIII - Eastern Visayas', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO IX - Zamboanga Peninsula', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO X - Northern Mindanao', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO XI - Davao Region', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO XII - SOCCSKSARGEN', 'operating_unit_type_id' => 3 ],
            ['name'=>'RFO XIII - CARAGA', 'operating_unit_type_id' => 3 ],
            ['name'=>'ACPC - Agricultural Credit Policy Council', 'operating_unit_type_id' => 4 ],
            ['name'=>'BFAR - Bureau of Fisheries and Aquatic Resources', 'operating_unit_type_id' => 4 ],
            ['name'=>'FPA-Fertilizer Pesticides Authority', 'operating_unit_type_id' => 4 ],
            ['name'=>'National Fisheries Research and Development Institute', 'operating_unit_type_id' => 4 ],
            ['name'=>'NMIS - National Meat Inspection Service', 'operating_unit_type_id' => 4 ],
            ['name'=>'Philippine Rubber Research Institute', 'operating_unit_type_id' => 4 ],
            ['name'=>'PCC - Phlippine Carabao Center', 'operating_unit_type_id' => 4 ],
            ['name'=>'PhilMech - Philippine Center for Postharvest Development and Mechanization', 'operating_unit_type_id' => 4 ],
            ['name'=>'PCAF - Philippine Council for Agriculture and Fisheries', 'operating_unit_type_id' => 4 ],
            ['name'=>'PhilFIDA - Philippine Fiber Industry Development Authority', 'operating_unit_type_id' => 4 ],
            ['name'=>'NDA - National Dairy Authority', 'operating_unit_type_id' => 5 ],
            ['name'=>'National Food Authority', 'operating_unit_type_id' => 5 ],
            ['name'=>'NTA - National Tobacco Administration', 'operating_unit_type_id' => 5 ],
            ['name'=>'PCA-Philippine Coconut Authority', 'operating_unit_type_id' => 5 ],
            ['name'=>'PCIC - Philippine Crop Insurance Corporation', 'operating_unit_type_id' => 5 ],
            ['name'=>'Philippine Fisheries Development Authority', 'operating_unit_type_id' => 5 ],
            ['name'=>'PhilRice - Philippine Rice Research Institute', 'operating_unit_type_id' => 5 ],
            ['name'=>'SRA - Sugar Regulatory Administration', 'operating_unit_type_id' => 5 ],
            ['name'=>'QUEDANCOR - Quedan and Rural Credit Guarantee Corporation', 'operating_unit_type_id' => 5 ],
        ];

        foreach ($seeds as $seed) {
            DB::table('operating_units')->insert([
                'name'                      => $seed['name'],
                'slug'                      => Str::slug($seed['name']),
                'uuid'                      => Str::uuid(),
                'operating_unit_type_id'    => $seed['operating_unit_type_id']
            ]);
        }
    }
}
