<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            
            'picture_path'=> $this->faker->filePath(),
            'classroomId'=> Classroom::factory(),
            
            'government'=> $this->faker->address(),
            'city'=> $this->faker->city(),
            'street'=> $this->faker->streetName(),
         
        ];
    }
}
