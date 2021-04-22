<?php

namespace Database\Seeders;

use App\Models\PdpIndicator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PdpIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $file = File::get(__DIR__ . '/pdp_indicators.json');
        $json = json_decode($file, true);

        Schema::disableForeignKeyConstraints();

        DB::table('pdp_indicators')->truncate();

        foreach ($json as $seed) {
            DB::table('pdp_indicators')->insert([
                'id'        => $seed['id'],
                'uuid'      => Str::uuid(),
                'name'      => $seed['name'],
                'slug'      => Str::slug($seed['name']),
                'parent_id' => $seed['parent_id'] ?? null
            ]);
        }

        Schema::enableForeignKeyConstraints();
        
    }
}
