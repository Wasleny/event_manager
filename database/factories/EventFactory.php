<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDateTime = $this->faker->dateTimeBetween('-5 years', '+5 years');
        $endDateTime = (clone $startDateTime)->modify('+' . rand(1, 10) . ' hours');

        $category = Category::inRandomOrder()->first();

        $suffix = [
            'Nacional',
            'Regional',
            'Municipal',
            'Estadual',
            'Privado',
            'Público'
        ];

        $name = $category->name . ' #' . $this->faker->numberBetween(10, 10000) . ' - ' . $this->faker->randomElement($suffix);

        return [
            'name' => $name,
            'description' => $this->faker->paragraph(3),
            'location' => $this->faker->city(),
            'start_datetime' => $startDateTime,
            'end_datetime' => $endDateTime,
            'maximum_capacity' => $this->faker->numberBetween(10, 10000),
            'category_id' => $category->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(Event::ARRAY_STATUS)
        ];
    }
}
