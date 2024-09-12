<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'level' => $this->faker->numberBetween(1,6),
            'capacity' => $this->faker->numberBetween(10,20),
            'time_table' => $this->faker->filePath(),
        ];
    }
}
