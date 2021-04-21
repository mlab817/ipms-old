<?php

namespace Database\Factories;

use App\Models\FundingInstitution;
use Illuminate\Database\Eloquent\Factories\Factory;

class FundingInstitutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FundingInstitution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $insti = $this->faker->word;

        return [
            'name' => $insti,
            'slug' => \Illuminate\Support\Str::slug($insti),
        ];
    }
}
