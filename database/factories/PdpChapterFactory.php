<?php

namespace Database\Factories;

use App\Models\PdpChapter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PdpChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PdpChapter::class;

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
