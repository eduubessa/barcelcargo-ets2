<?php

namespace Database\Factories;

use App\Models\Event;
use App\Utils\Constants\StatusInterface;
use App\Utils\Constants\TypeInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

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
            'photo' => $this->faker->imageUrl('1920', '1280'),
            'title' => $this->faker->title,
            'description' => $this->faker->realText(150),
            'body' => $this->faker->realText(200),
            'event_at' => $this->faker->dateTime,
            'slug' => $this->faker->unique()->slug,
            'type' => TypeInterface::Types_Event_Normal,
            'status' => StatusInterface::Status_Event_Pending
        ];
    }
}
