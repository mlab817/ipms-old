<?php

namespace App\Console\Commands;

use App\Models\Pipol;
use App\Models\Review;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class MigratePipolCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:pipol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate PIPOL table, seed and populate';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // truncate table
        if (Pipol::truncate()) {
            $this->info('Pipols table truncated.');
        }

        try {
            $json = \File::get(database_path() . '/seeders/json/pipol.json');

            $this->info('Retrieved seed file');

            $pipols = json_decode($json, true);

            $this->output->progressStart(count($pipols));

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

                $this->output->progressAdvance();
            }

            $this->output->progressFinish();

            $this->info('Successfully seeded PIPOLs table');

        } catch (FileNotFoundException | \Exception $exception) {
            $this->error($exception->getMessage());
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
            $safeUrl = str_replace($removeUrl, '', $url);
        }

        return $safeUrl;
    }
}
