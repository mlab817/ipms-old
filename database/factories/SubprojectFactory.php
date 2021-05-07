<?php

namespace Database\Factories;

use App\Models\OperatingUnit;
use App\Models\Project;
use App\Models\Subproject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubprojectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subproject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id'        => Project::all()->random(1)->first()->id,
            'operating_unit_id' => OperatingUnit::all()->random(1)->first()->id,
            'title'             => $this->faker->sentence, // $this->faker->words,
            'description'       => $this->faker->paragraph, // $this->faker->paragraph(3),
            'expected_outputs'  => $this->faker->paragraph, // $this->faker->paragraph(2),
            'total_cost'        => $this->faker->randomFloat() * 1000,
            'funding_year'      => $this->faker->randomElement(config('ipms.editor.years')),
            'y2017'             => $this->faker->randomFloat() * 1000,
            'y2018'             => $this->faker->randomFloat() * 1000,
            'y2019'             => $this->faker->randomFloat() * 1000,
            'y2020'             => $this->faker->randomFloat() * 1000,
            'y2021'             => $this->faker->randomFloat() * 1000,
            'y2022'             => $this->faker->randomFloat() * 1000,
        ];
    }
}
