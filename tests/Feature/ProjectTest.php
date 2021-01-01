<?php

namespace Tests\Feature;

use App\Http\Resources\ProjectResource;
use App\Models\Allocation;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\Disbursement;
use App\Models\FeasibilityStudy;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Nep;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ReadinessLevel;
use App\Models\ResettlementActionPlan;
use App\Models\RightOfWay;
use App\Models\SpatialCoverage;
use App\Models\Tier;
use App\Models\User;
use Database\Seeders\ApprovalLevelsTableSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    const CONTRIBUTOR_EMAIL = 'contributor@example.com';
    const EDITOR_EMAIL = 'editor@example.com';
    const ADMIN_EMAIL = 'admin@example.com';

    public function test_it_returns_a_collection_of_projects()
    {
        $this->withoutExceptionHandling();

        $projects = Project::factory()->count(25)->create();

        $response = $this->get(route('api.projects.index'))
            ->assertStatus(200);

        $this->assertArrayHasKey('data', $response->json());

        $response->dump();
    }

    public function test_it_returns_401_if_user_is_unauthorized()
    {
        $project = [];

        $this->postJson(route('api.projects.store'), $project)
            ->assertStatus(401);
    }

    public function test_it_returns_403_if_user_does_not_have_permission()
    {
        $project = [];

        $this
            ->actingAs(User::factory()->create())
            ->postJson(route('api.projects.store'), $project)
            ->assertStatus(403);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_creates_a_project()
    {
        $project = [
            'code' => '',
            'title' => 'new project',
            'pap_type_id' => PapType::all()->random()->id,
            'regular_program' => $this->faker->boolean,
            'description' => 'description',
            'spatial_coverage_id' => SpatialCoverage::all()->random()->id,
            'iccable' => $this->faker->boolean,
            'pip' => $this->faker->boolean,
            'research' => $this->faker->boolean,
            'cip' => $this->faker->boolean,
            'cip_type_id' => CipType::factory()->create()->id,
            'trip' => $this->faker->boolean,
            'rdip' => $this->faker->boolean,
            'rdc_endorsement_required' => '',
            'rdc_endorsed' => $this->faker->boolean,
            'rdc_endorsed_date' => '',
            'other_infrastructure' => '',
            'risk' => $this->faker->paragraph,
            'pdp_chapter_id' => PdpChapter::factory()->create()->id,
            'no_pdp_indicator' => '',
            'gad_id' => '',
            'target_start_year' => '',
            'target_end_year' => '',
            'has_fs' => $this->faker->boolean,
            'has_row' => $this->faker->boolean,
            'has_rap' => $this->faker->boolean,
            'employment_generated' => '',
            'funding_source_id' => FundingSource::all()->random()->id,
            'implementation_mode_id' => ImplementationMode::all()->random()->id,
            'other_fs' => '',
            'project_status_id' => ProjectStatus::all()->random()->id,
            'updates' => $this->faker->paragraph,
            'updates_date' => $this->faker->date(),
            'uacs_code' => '',
            'tier_id' => Tier::all()->random()->id,
            'approval_level_id' => ApprovalLevel::factory()->create()->id,
            'approval_date' => $this->faker->date(),
        ];

        $response = $this
            ->actingAs(User::where('email',self::CONTRIBUTOR_EMAIL)->first())
            ->json('POST', route('api.projects.store'), $project);

        $response->assertStatus(200);

        $response->dump();
    }



    /**
     *
     */
//    public function test_it_updates_a_project()
//    {
//        $project = Project::factory()->create();
//
//        $user = User::factory()->create();
//        $user->assignRole('contributor');
//
//        $update = [
//            'title' => 'New title',
//        ];
//
//        $response = $this
//            ->actingAs($user)
//            ->json('PUT', route('api.projects.update', $project->id), $update);
//
//        $response->assertStatus(200);
//
//        $response->dump();
//    }
}
