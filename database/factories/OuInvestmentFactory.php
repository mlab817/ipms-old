<?php

namespace Database\Factories;

use App\Models\OperatingUnit;
use App\Models\OuInvestment;
use Illuminate\Database\Eloquent\Factories\Factory;

class OuInvestmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OuInvestment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ou_id' => OperatingUnit::all()->random()->id,
            't2016' => $this->faker->randomFloat() * 1000000,
            't2017' => $this->faker->randomFloat() * 1000000,
            't2018' => $this->faker->randomFloat() * 1000000,
            't2019' => $this->faker->randomFloat() * 1000000,
            't2020' => $this->faker->randomFloat() * 1000000,
            't2021' => $this->faker->randomFloat() * 1000000,
            't2022' => $this->faker->randomFloat() * 1000000,
            't2023' => $this->faker->randomFloat() * 1000000,
            't2024' => $this->faker->randomFloat() * 1000000,
            't2025' => $this->faker->randomFloat() * 1000000,
            'i2016' => $this->faker->randomFloat() * 1000000,
            'i2017' => $this->faker->randomFloat() * 1000000,
            'i2018' => $this->faker->randomFloat() * 1000000,
            'i2019' => $this->faker->randomFloat() * 1000000,
            'i2020' => $this->faker->randomFloat() * 1000000,
            'i2021' => $this->faker->randomFloat() * 1000000,
            'i2022' => $this->faker->randomFloat() * 1000000,
            'i2023' => $this->faker->randomFloat() * 1000000,
            'i2024' => $this->faker->randomFloat() * 1000000,
            'i2025' => $this->faker->randomFloat() * 1000000,
        ];
    }
}
