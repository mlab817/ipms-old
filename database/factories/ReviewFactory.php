<?php

namespace Database\Factories;

use App\Models\CipType;
use App\Models\PipTypology;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pip = $this->faker->boolean;
        $cip = $this->faker->boolean;
        $trip = $this->faker->boolean;

        return [
            'project_id'        => Project::doesntHave('review')->get()->random()->id,
            'pip'               => $pip,
            'pip_typology_id'   => $pip ? PipTypology::all()->random()->id : null,
            'cip'               => $cip,
            'cip_type_id'       => $cip ? CipType::all()->random()->id : null,
            'trip'              => $trip,
        ];
    }
}
