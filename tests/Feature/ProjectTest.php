<?php

namespace Tests\Feature;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Allocation;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\Disbursement;
use App\Models\FeasibilityStudy;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Nep;
use App\Models\OperatingUnit;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\Permission;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectAudit;
use App\Models\ProjectStatus;
use App\Models\ReadinessLevel;
use App\Models\Region;
use App\Models\RegionInvestment;
use App\Models\ResettlementActionPlan;
use App\Models\RightOfWay;
use App\Models\Role;
use App\Models\SpatialCoverage;
use App\Models\Tier;
use App\Models\User;
use Database\Seeders\ApprovalLevelsTableSeeder;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ProjectsTableSeeder;
use Database\Seeders\RolesAndPermissionsTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use WithFaker;

    const CONTRIBUTOR_EMAIL = 'contributor@example.com';
    const EDITOR_EMAIL = 'editor@example.com';
    const ADMIN_EMAIL = 'admin@example.com';

    public function createProjectInput(): array
    {

        $startYear = $this->faker->randomDigit + 2016;

        return [
            'code'                      => '',
            'title'                     => 'new project',
            'pap_type_id'               => PapType::factory()->create()->id,
            'regular_program'           => $this->faker->boolean,
            'description'               => $this->faker->paragraph(10),
            'expected_outputs'          => $this->faker->paragraph(10),
            'spatial_coverage_id'       => SpatialCoverage::factory()->create()->id,
            'iccable'                   => $this->faker->boolean,
            'pip'                       => $this->faker->boolean,
            'pip_typology_id'           => PipTypology::factory()->create()->id,
            'research'                  => $this->faker->boolean,
            'cip'                       => $this->faker->boolean,
            'cip_type_id'               => CipType::factory()->create()->id,
            'trip'                      => $this->faker->boolean,
            'rdip'                      => $this->faker->boolean,
            'rdc_endorsement_required'  => $this->faker->boolean,
            'rdc_endorsed'              => $this->faker->boolean,
            'rdc_endorsed_date'         => $this->faker->date(),
            'other_infrastructure'      => $this->faker->word,
            'risk'                      => $this->faker->paragraph,
            'pdp_chapter_id'            => PdpChapter::factory()->create()->id,
            'no_pdp_indicator'          => $this->faker->boolean,
            'gad_id'                    => Gad::factory()->create()->id,
            'target_start_year'         => $startYear,
            'target_end_year'           => $startYear + $this->faker->randomDigit,
            'has_fs'                    => $this->faker->boolean,
            'has_row'                   => $this->faker->boolean,
            'has_rap'                   => $this->faker->boolean,
            'employment_generated'      => $this->faker->word,
            'funding_source_id'         => FundingSource::factory()->create()->id,
            'implementation_mode_id'    => ImplementationMode::factory()->create()->id,
            'other_fs'                  => $this->faker->word,
            'project_status_id'         => ProjectStatus::factory()->create()->id,
            'updates'                   => $this->faker->paragraph,
            'updates_date'              => $this->faker->date(),
            'uacs_code'                 => $this->faker->isbn13,
            'tier_id'                   => Tier::factory()->create()->id,
            'approval_level_id'         => ApprovalLevel::factory()->create()->id,
            'approval_date'             => $this->faker->date(),
            'regions'                   => Region::factory()->count(3)->create()->pluck('id'),
            'funding_sources'           => FundingSource::factory()->count(1)->create()->pluck('id'),
            'funding_institutions'      => FundingInstitution::factory()->count(1)->create()->pluck('id'),
            'implementing_agencies'     => OperatingUnit::factory()->count(1)->create()->pluck('id'),
            'region_investments'        => [
                [
                    'region_id'         => Region::factory()->create()->id,
                    'y2016'                 => 0,
                    'y2017'                 => 0,
                    'y2018'                 => 0,
                    'y2019'                 => 0,
                    'y2020'                 => 0,
                    'y2021'                 => 0,
                    'y2022'                 => 0,
                    'y2023'                 => 0,
                    'y2024'                 => 0,
                    'y2025'                 => 0,
                ]
            ],
            'fs_investments'            => [
                [
                    'fs_id'                 => FundingSource::factory()->create()->id,
                    'y2016'                 => 0,
                    'y2017'                 => 0,
                    'y2018'                 => 0,
                    'y2019'                 => 0,
                    'y2020'                 => 0,
                    'y2021'                 => 0,
                    'y2022'                 => 0,
                    'y2023'                 => 0,
                    'y2024'                 => 0,
                    'y2025'                 => 0,
                ]
            ],
            'ou_investments'            => [
                [
                    'ou_id'                 => OperatingUnit::factory()->create()->id,
                    'y2016'                 => 0,
                    'y2017'                 => 0,
                    'y2018'                 => 0,
                    'y2019'                 => 0,
                    'y2020'                 => 0,
                    'y2021'                 => 0,
                    'y2022'                 => 0,
                    'y2023'                 => 0,
                    'y2024'                 => 0,
                    'y2025'                 => 0,
                ]
            ],
            'feasibility_study'         => [
                'fs_status_id'          => FsStatus::factory()->create()->id,
                'needs_assistance'      => false,
                'y2017'                 => 0,
                'y2018'                 => 0,
                'y2019'                 => 0,
                'y2020'                 => 0,
                'y2021'                 => 0,
                'y2022'                 => 0,
                'y2023'                 => 0,
                'y2024'                 => 0,
                'y2025'                 => 0,
            ],
            'right_of_way'              => [
                'y2017'                 => 0,
                'y2018'                 => 0,
                'y2019'                 => 0,
                'y2020'                 => 0,
                'y2021'                 => 0,
                'y2022'                 => 0,
                'y2023'                 => 0,
                'y2024'                 => 0,
                'y2025'                 => 0,
                'affected_households'   => $this->faker->word,
            ],
            'resettlement_action_plan'  => [
                'y2017'                 => 0,
                'y2018'                 => 0,
                'y2019'                 => 0,
                'y2020'                 => 0,
                'y2021'                 => 0,
                'y2022'                 => 0,
                'y2023'                 => 0,
                'y2024'                 => 0,
                'y2025'                 => 0,
                'affected_households'   => $this->faker->word,
            ],
            'nep'                       => [
                'y2016'                 => 0,
                'y2017'                 => 0,
                'y2018'                 => 0,
                'y2019'                 => 0,
                'y2020'                 => 0,
                'y2021'                 => 0,
                'y2022'                 => 0,
                'y2023'                 => 0,
                'y2024'                 => 0,
                'y2025'                 => 0,
            ],
            'allocation'                => [
                'y2016'                 => 0,
                'y2017'                 => 0,
                'y2018'                 => 0,
                'y2019'                 => 0,
                'y2020'                 => 0,
                'y2021'                 => 0,
                'y2022'                 => 0,
                'y2023'                 => 0,
                'y2024'                 => 0,
                'y2025'                 => 0,
            ],
            'disbursement'              => [
                'y2016'                 => 0,
                'y2017'                 => 0,
                'y2018'                 => 0,
                'y2019'                 => 0,
                'y2020'                 => 0,
                'y2021'                 => 0,
                'y2022'                 => 0,
                'y2023'                 => 0,
                'y2024'                 => 0,
                'y2025'                 => 0,
            ],
        ];
    }

    public function test_it_returns_a_collection_of_projects()
    {
        $this->withoutExceptionHandling();

        $this->loginUser();

        $this->seed(ProjectsTableSeeder::class);

        $response = $this->get(route('api.projects.index'))
            ->assertStatus(200);

        $this->assertArrayHasKey('data', $response->json());
    }

    public function test_it_returns_401_if_user_is_unauthenticated()
    {
        $response = $this->postJson(route('api.projects.store'))
            ->assertStatus(401);

        $this->assertArrayHasKey('error', $response->json());
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function test_it_returns_403_unauthorized_to_create_project()
    {
        $this->loginUser();

        $response = $this
            ->postJson(route('api.projects.store'))
            ->assertStatus(403);

        $this->assertArrayHasKey('error', $response->json());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_with_projects_create_permission_can_create_project_and_returns_project()
    {
        $this->withoutExceptionHandling();

        $project = $this->createProjectInput();

        // create a user that can create project
        $this->loginAsProjectCreator();

        Event::fake();

        $response = $this
            ->json('POST', route('api.projects.store'), $project);

        // check that a new model was created
        $response->assertStatus(201);

        // check that it has been saved to the database
        $this->assertDatabaseHas('projects',[
            'title' => $project['title'],
        ]);

        // check that the returned response has a project key
        $this->assertArrayHasKey('project', $response->json());
    }

    /**
     * @group project-rules
     */
    public function test_title_is_required_to_create_project()
    {
        $this->loginAsProjectCreator();

        $this->postJson(route('api.projects.store'), [
            'title' => '',
        ])->assertStatus(422)
            ->assertJsonStructure(['errors' => [
                'title'
            ]]);
    }

    public function test_it_gets_a_project_by_slug()
    {
        $this->withoutExceptionHandling();

        $project = Project::factory()->create();

        $response = $this
            ->json('GET', route('api.projects.show', $project->slug))
            ->assertStatus(200);
    }

    public function test_admin_can_delete_a_project()
    {
        $project = Project::factory()->create();

        $this->loginAsAdmin();

        $response = $this
            ->json('DELETE', route('api.projects.delete', $project->slug))
            ->assertStatus(204);
    }

    public function test_owner_can_delete_own_project()
    {
        $project = Project::factory()->create();

        $user = User::where('email', self::CONTRIBUTOR_EMAIL)->first();
        Event::fakeFor(function() use ($project, $user) {
            $project->created_by = $user->id;
            $project->save();
        });

        $response = $this
            ->actingAs($user)
            ->json('DELETE', route('api.projects.delete', $project->slug))
            ->assertStatus(204);
    }

    /**
     *
     */
    public function test_it_updates_a_project()
    {
        $project = $this->createTestProject();
        $user = User::where('email', self::CONTRIBUTOR_EMAIL)->first();
        Event::fakeFor(function() use ($project, $user) {
            $project->created_by = $user->id;
            $project->save();
        });

        $update = $this->createProjectInput();

        $response = $this
            ->actingAs($user)
            ->json(
                'PUT', route('api.projects.update', $project->slug), $update);

        $response->assertStatus(200);

        $response->dump();
    }

    public function test_it_returns_own_projects()
    {
        $user = User::where('email', self::CONTRIBUTOR_EMAIL)->first();
        $project = Project::factory()->create([
            'created_by' => $user->id,
        ]);

        $response = $this
            ->actingAs($user)
            ->json('get', route('api.projects.index', [
                'scope' => 'own'
            ]));

        $response->assertStatus(200);
    }
}
