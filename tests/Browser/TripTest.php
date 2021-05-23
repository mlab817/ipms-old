<?php

namespace Tests\Browser;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TripTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::find(1);
        $project = Project::where('has_infra',1)->orderBy('id','desc')->first();

        $this->browse(function (Browser $browser) use ($user, $project) {
            $url = route('trips.create', $project);
            $browser
                    ->loginAs($user->id)
                    ->visit($url)
                    ->assertSee('TRIP')
                    ->screenshot('projects/trip/1')
                    ->script('window.scrollTo(0, 1080);');

            $browser->screenshot('projects/trip/2')
                ->script('window.scrollTo(1080, 2160);');

            $browser->screenshot('projects/trip/3')
                ->script('window.scrollTo(2160, 3240);');

            $browser->screenshot('projects/trip/4');
        });
    }
}
