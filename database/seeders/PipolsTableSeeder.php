<?php

namespace Database\Seeders;

use App\Models\Pipol;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PipolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = \File::get(database_path() . '/seeders/json/pipol.json');

        $pipols = json_decode($json, true);

        foreach ($pipols as $pipol) {
            $pipol = Pipol::create([
                'pipol_code'        => $pipol['PIPOL Code'],
                'project_title'     => $pipol['Project Title'],
                'spatial_coverage'  => $pipol['Spatial Coverage'],
                'category'          => $pipol['Category'],
                'submission_status' => $pipol['Status of Submission'],
            ]);

            $project = Review::where('pipol_code', $pipol->pipol_code)->first();

            if ($project) {
                $pipol->ipms_id = $project->project_id;
                $pipol->save();
            }
        }
    }
}
