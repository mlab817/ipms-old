<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $email = $this->faker->safeEmail;
        return [
            'email'             => $email,
            'office_id'         => Office::all()->random()->id,
            'invited_by'        => User::all()->random()->id,
            'invitation_token'  => substr(md5(rand(0, 9) . $email . time()), 0, 32),
        ];
    }
}
