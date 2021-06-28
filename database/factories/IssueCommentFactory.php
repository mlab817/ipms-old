<?php

namespace Database\Factories;

use App\Models\Issue;
use App\Models\IssueComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IssueComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'issue_id'  => Issue::count() ? Issue::all()->random()->id : Issue::factory()->create(),
            'comment'   => $this->faker->paragraph,
            'action'    => $this->faker->randomElement(['','close','reopen']),
            'created_by'=> User::all()->random()->id,
        ];
    }
}
