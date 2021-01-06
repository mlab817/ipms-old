<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\OperatingUnit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Office::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = $this->faker->company;
        return [
            'uuid'                  => Str::uuid(),
            'name'                  => $company,
            'slug'                  => Str::slug($company),
            'email'                 => $this->faker->companyEmail,
            'contact_numbers'       => $this->faker->phoneNumber,
            'office_head_name'      => $this->faker->name,
            'office_head_position'  => $this->faker->jobTitle,
            'operating_unit_id'     => OperatingUnit::all()->random()->id,
        ];
    }
}
