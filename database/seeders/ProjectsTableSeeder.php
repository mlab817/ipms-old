<?php

namespace Database\Seeders;

use App\Models\FeasibilityStudy;
use App\Models\FsInfrastructure;
use App\Models\FsInvestment;
use App\Models\OuInfrastructure;
use App\Models\OuInvestment;
use App\Models\Project;
use App\Models\RegionInfrastructure;
use App\Models\RegionInvestment;
use App\Models\ResettlementActionPlan;
use App\Models\RightOfWay;
use Database\Factories\OuInvestmentFactory;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::unsetEventDispatcher();


        Project::factory()
            ->has(RightOfWay::factory(),'right_of_way')
            ->has(ResettlementActionPlan::factory(),'resettlement_action_plan')
            ->has(FeasibilityStudy::factory(), 'feasibility_study')
            ->has(OuInvestment::factory()->count(2), 'ou_investments')
            ->has(OuInfrastructure::factory()->count(2), 'ou_infrastructures')
            ->has(RegionInvestment::factory()->count(2), 'region_investments')
            ->has(RegionInfrastructure::factory()->count(2), 'region_infrastructures')
            ->has(FsInvestment::factory()->count(2), 'fs_investments')
            ->has(FsInfrastructure::factory()->count(2), 'fs_infrastructures')
            ->count(50)
            ->create();
    }
}
