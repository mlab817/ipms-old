<?php

namespace Database\Factories;

use App\Models\FundingSource;
use App\Models\Region;
use App\Models\RegionInvestment;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionInvestmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RegionInvestment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'region_id' => Region::all()->random()->id,
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
