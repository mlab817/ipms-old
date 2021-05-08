<?php

namespace Tests\Browser;

use App\Models\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Event;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReviewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_it_shows_review_index_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(1)
                ->visit(route('reviews.index'))
                ->assertSee('Review Projects')
                ->screenshot('reviews/index');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_it_shows_create_review_page()
    {
        $this->browse(function (Browser $browser) {
            $project = Project::all()->first();
            $browser
                ->loginAs(1)
                ->visit(route('reviews.create', ['project' => $project]))
                ->assertSee('Reviewing '. $project->title)
                ->screenshot('reviews/create');
        });
    }
}
