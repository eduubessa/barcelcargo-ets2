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
            'trailer_id' => 'teste',
            'name' => "Carros",
            'source_city' => $this->faker->state,
            'destination_city' => $this->faker->state,
            'source_company' => $this->faker->company,
            'destination_company' => $this->faker->company,
            'distance_come' => $this->faker->randomNumber(4),
            'estimed_distance' => $this->faker->randomNumber(4),
            'income' => $this->faker->randomNumber(4),
            'mass' => $this->faker->randomNumber(4),
            'deadline_time' => $this->faker->dateTime,
            'status' => StatusInterface::Status_Cargo_Excellent,
            'created_at' => date('2020-11-05 H:s:m')
        ];
    }
}
