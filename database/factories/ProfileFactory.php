<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'nickname'  => $this->faker->name,
            'avatar'    => $this->faker->imageUrl(),
            'office_id' => Office::factory(),
        ];
    }
}
