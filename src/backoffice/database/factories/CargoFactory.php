<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Utils\Constants\StatusInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

class CargoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cargo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1,
            'material' => "Carros",
            'enterprise_from' => $this->faker->company,
            'enterprise_to' => $this->faker->company,
            'location_from' => $this->faker->state,
            'location_to' => $this->faker->state,
            'kms' => $this->faker->randomNumber(4),
            'cargo_value' => $this->faker->randomNumber(4),
            'cargo_value_finally' => $this->faker->randomNumber(4),
            'status' => StatusInterface::Status_Cargo_Excellent
        ];
    }
}
