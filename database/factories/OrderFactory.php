<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bl_number'          => "BL-" . sprintf('%08d', rand(0, 100)),
            'bl_release_user_id' => User::all()->random()->id,
            'freight_payer_self' => false,
            'contract_number'    => '099999999',
        ];
    }
}
