<?php

namespace Database\Factories;

use App\Models\Basis;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Basis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
