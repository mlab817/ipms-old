<?php

namespace Database\Factories;

use App\Models\PipTypology;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PipTypologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PipTypology::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'          => Str::uuid(),
            'name'          => $this->faker->word,
            'description'   => '',
        ];
    }
}
