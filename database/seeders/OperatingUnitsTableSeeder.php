<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
            ['name'=>'DA-CO - DA Central Office', 'operating_unit_type_id' => 1, 'label' => 'DA-CO' ],
            ['name'=>'ATI - Agricultural Training Institute', 'operating_unit_type_id' => 2, 'label' => 'ATI' ],
            ['name'=>'BAFS - Bureau of Agricultural and Fisheries Standards', 'operating_unit_type_id' => 2, 'label' => 'BAFS' ],
            ['name'=>'BAI - Bureau of Animal Industry', 'operating_unit_type_id' => 2, 'label' => 'BAI' ],
            ['name'=>'BAR - Bureau of Agricultural Research', 'operating_unit_type_id' => 2, 'label' => 'BAR' ],
            ['name'=>'BPI - Bureau of Plant Industry', 'operating_unit_type_id' => 2, 'label' => 'BPI' ],
            ['name'=>'BSWM - Bureau of Soils and Water Management', 'operating_unit_type_id' => 2, 'label' => 'BSWM' ],
            ['name'=>'BAFE - Bureau of Agricultural and Fisheries Engineering', 'operating_unit_type_id' => 2, 'label' => 'BAFE' ],
            ['name'=>'RFO CAR - Cordillera Administrative Region', 'operating_unit_type_id' => 3, 'label' => 'RFO CAR' ],
            ['name'=>'RFO I - Ilocos Region', 'operating_unit_type_id' => 3, 'label' => 'RFO I' ],
            ['name'=>'RFO II - Cagayan Valley', 'operating_unit_type_id' => 3, 'label' => 'RFO II' ],
            ['name'=>'RFO III - Central Luzon', 'operating_unit_type_id' => 3, 'label' => 'RFO III' ],
            ['name'=>'RFO IVA - CALABARZON', 'operating_unit_type_id' => 3, 'label' => 'RFO IVA' ],
            ['name'=>'RFO IVB - MIMAROPA', 'operating_unit_type_id' => 3, 'label' => 'RFO IVB' ],
            ['name'=>'RFO V - Bicol Region', 'operating_unit_type_id' => 3, 'label' => 'RFO V' ],
            ['name'=>'RFO VI - Western Visayas', 'operating_unit_type_id' => 3, 'label' => 'RFO VI' ],
            ['name'=>'RFO VII - Central Visayas', 'operating_unit_type_id' => 3, 'label' => 'RFO VII' ],
            ['name'=>'RFO VIII - Eastern Visayas', 'operating_unit_type_id' => 3, 'label' => 'RFO VIII' ],
            ['name'=>'RFO IX - Zamboanga Peninsula', 'operating_unit_type_id' => 3, 'label' => 'RFO IX' ],
            ['name'=>'RFO X - Northern Mindanao', 'operating_unit_type_id' => 3, 'label' => 'RFO X' ],
            ['name'=>'RFO XI - Davao Region', 'operating_unit_type_id' => 3, 'label' => 'RFO XI' ],
            ['name'=>'RFO XII - SOCCSKSARGEN', 'operating_unit_type_id' => 3, 'label' => 'RFO XII' ],
            ['name'=>'RFO XIII - CARAGA', 'operating_unit_type_id' => 3, 'label' => 'RFO XIII' ],
            ['name'=>'ACPC - Agricultural Credit Policy Council', 'operating_unit_type_id' => 4, 'label' => 'ACPC' ],
            ['name'=>'BFAR - Bureau of Fisheries and Aquatic Resources', 'operating_unit_type_id' => 4, 'label' => 'BFAR' ],
            ['name'=>'FPA - Fertilizer Pesticides Authority', 'operating_unit_type_id' => 4, 'label' => 'FPA' ],
            ['name'=>'NFRDI - National Fisheries Research and Development Institute', 'operating_unit_type_id' => 4, 'label' => 'NFRDI' ],
            ['name'=>'NMIS - National Meat Inspection Service', 'operating_unit_type_id' => 4, 'label' => 'NMIS' ],
            ['name'=>'PRRI - Philippine Rubber Research Institute', 'operating_unit_type_id' => 4, 'label' => 'PRRI' ],
            ['name'=>'PCC - Phlippine Carabao Center', 'operating_unit_type_id' => 4, 'label' => 'PCC' ],
            ['name'=>'PhilMech - Philippine Center for Postharvest Development and Mechanization', 'operating_unit_type_id' => 4, 'label' => 'PhilMech' ],
            ['name'=>'PCAF - Philippine Council for Agriculture and Fisheries', 'operating_unit_type_id' => 4, 'label' => 'PCAF' ],
            ['name'=>'PhilFIDA - Philippine Fiber Industry Development Authority', 'operating_unit_type_id' => 4, 'label' => 'PhilFIDA' ],
            ['name'=>'NDA - National Dairy Authority', 'operating_unit_type_id' => 5, 'label' => 'NDA' ],
            ['name'=>'NFA -National Food Authority', 'operating_unit_type_id' => 5, 'label' => 'NFA' ],
            ['name'=>'NTA - National Tobacco Administration', 'operating_unit_type_id' => 5, 'label' => 'NTA' ],
            ['name'=>'PCA - Philippine Coconut Authority', 'operating_unit_type_id' => 5, 'label' => 'PCA' ],
            ['name'=>'PCIC - Philippine Crop Insurance Corporation', 'operating_unit_type_id' => 5, 'label' => 'PCIC' ],
            ['name'=>'PFDA - Philippine Fisheries Development Authority', 'operating_unit_type_id' => 5, 'label' => 'PFDA' ],
            ['name'=>'PhilRice - Philippine Rice Research Institute', 'operating_unit_type_id' => 5, 'label' => 'PhilRice' ],
            ['name'=>'SRA - Sugar Regulatory Administration', 'operating_unit_type_id' => 5, 'label' => 'SRA' ],
            ['name'=>'QUEDANCOR - Quedan and Rural Credit Guarantee Corporation', 'operating_unit_type_id' => 5, 'label' => 'QUEDANCOR' ],
        ];

        Schema::disableForeignKeyConstraints();

        DB::table('operating_units')->truncate();

        foreach ($seeds as $seed) {
            DB::table('operating_units')->insert([
                'name'                      => $seed['name'],
                'slug'                      => Str::slug($seed['name']),
                'operating_unit_type_id'    => $seed['operating_unit_type_id'],
                'label'                     => $seed['label']
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
