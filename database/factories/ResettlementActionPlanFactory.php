<?php

namespace Database\Factories;

use App\Models\ResettlementActionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResettlementActionPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResettlementActionPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'y2017' => $this->faker->randomFloat() * 1000000,
            'y2018' => $this->faker->randomFloat() * 1000000,
            'y2019' => $this->faker->randomFloat() * 1000000,
            'y2020' => $this->faker->randomFloat() * 1000000,
            'y2021' => $this->faker->randomFloat() * 1000000,
            'y2022' => $this->faker->randomFloat() * 1000000,
            'y2023' => $this->faker->randomFloat() * 1000000,
            'y2024' => $this->faker->randomFloat() * 1000000,
            'y2025' => $this->faker->randomFloat() * 1000000,
            'affected_households' => $this->faker->word,
        ];
    }
}
