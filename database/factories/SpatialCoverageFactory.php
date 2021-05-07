<?php

namespace Database\Factories;

use App\Models\SpatialCoverage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SpatialCoverageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpatialCoverage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->word,
            'description'   => $this->faker->sentence,
        ];
    }
}
