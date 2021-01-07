<?php

namespace Database\Factories;

use App\Models\FsStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FsStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FsStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = $this->faker->state;

        return [
            'name'  => $state,
            'slug'  => Str::slug($state),
        ];
    }
}
