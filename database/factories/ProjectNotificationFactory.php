<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectNotification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectNotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectNotification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::all()->random()->id,
            'user_id'   => User::all()->random()->id,
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'receiver_id' => User::all()->random()->id,
            'read_at' => null,
        ];
    }
}
