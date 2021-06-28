<?php

namespace Database\Factories;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Issue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id'    => Project::all()->random()->id,
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraph,
            'created_by'    => User::all()->random()->id,
            'status'        => $this->faker->randomElement(['open','close']),
        ];
    }
}
