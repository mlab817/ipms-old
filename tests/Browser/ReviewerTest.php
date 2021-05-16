<?php

namespace Tests\Browser;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Test reviewer capabilities
 *
 * Class ReviewerTest
 * @package Tests\Browser
 */
class ReviewerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_logins_a_reviewer()
    {
        $this->browse(function (Browser $browser) {
            $reviewer = User::where('email','reviewer.main@admin.com')->first();

            // activate user and change password
            $reviewer->activate();
            $reviewer->password_changed_at = now();
            $reviewer->save();

            $browser
                    ->loginAs($reviewer->id)
                    ->visit('/dashboard')
                    ->assertSee('Dashboard')
                    ->assertSee('Review PAPs')
                    ->screenshot('reviewer/dashboard');
        });
    }

    public function test_it_shows_review_paps_index_when_visited_as_reviewer()
    {
        $this->browse(function (Browser $browser) {
            $reviewer = User::where('email','reviewer.main@admin.com')->first();

            // activate user and change password
            $reviewer->activate();
            $reviewer->password_changed_at = now();
            $reviewer->save();

            $browser
                ->loginAs($reviewer->id)
                ->visit('/dashboard')
                ->click('a[href="' . route('reviews.index') .'"]')
                ->assertPathIs('/reviews')
                ->assertSee('Review PAPs')
                ->screenshot('reviewer/reviews/index');
        });
    }

    public function test_it_shows_add_review_page_when_visited_as_reviewer()
    {
        $project = Project::withoutEvents(function() {
            return Project::factory()->create();
        });


        $this->browse(function (Browser $browser) use ($project) {
            $reviewer = User::where('email','reviewer.main@admin.com')->first();

            // activate user and change password
            $reviewer->activate();
            $reviewer->password_changed_at = now();
            $reviewer->save();

            $browser
                ->loginAs($reviewer->id)
                ->visit('/reviews')
                ->click('a[href="' . route('reviews.create', $project) .'"]')
                ->assertPathIs('/projects/' . $project->uuid . '/review/create')
                ->assertSee('Review PAPs')
                ->screenshot('reviewer/reviews/create');
        });
    }
}
