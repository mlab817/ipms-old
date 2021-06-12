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

        // truncate table
        Pipol::truncate();

        foreach ($pipols as $pipol) {
            $pipol = Pipol::create([
                'pipol_code'        => $pipol['PIPOL Code'],
                'project_title'     => $pipol['Project Title'],
                'spatial_coverage'  => $pipol['Spatial Coverage'],
                'category'          => $pipol['Category'],
                'submission_status' => $pipol['Status of Submission'],
            ]);

            $review = Review::where('pipol_code', $pipol->pipol_code)->first();

            if ($review) {
                $pipol->pipol_url = $this->removeUrl($review->pipol_url);
                $pipol->ipms_id = $review->project_id;
                $pipol->remarks = $review->comments;
                $pipol->save();
            }
        }
    }

    public function removeUrl($url)
    {
        $baseUrl = [
            'https://pipol.neda.gov.ph/editproject/',
            'http://pipol.neda.gov.ph/editproject/',
            'https://pipolv2.neda.gov.ph/editproject/',
            'http://pipolv2.neda.gov.ph/editproject/',
        ];

        foreach ($baseUrl as $removeUrl) {
            $url = str_replace($removeUrl, '', $url);
        }

        return $url;
    }
}
