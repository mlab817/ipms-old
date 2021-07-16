<?php

namespace Database\Factories;

use App\Models\PipolStatus;
use App\Models\Project;
use App\Models\Tracker;
use App\Models\UpdatingPeriod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tracker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'updating_period_id' => UpdatingPeriod::all()->random()->id,
            'project_id' => Project::all()->random()->id,
            'pipol_status_id' => PipolStatus::all()->random()->id,
            'remarks' => $this->faker->paragraph,
            'user_id' => User::all()->random()->id,
        ];
    }
}
