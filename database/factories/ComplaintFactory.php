<?php

namespace Database\Factories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Complaint::getCodeGenerate(),
            'course' => $this->faker->sentence(3),
            'specialite' => $this->faker->word(1),
            'date' => $this->faker->date(),
            'start' => $this->faker->time(),
            'end' => $this->faker->time(),
            'teacher_id' => $this->faker->numberBetween(1, 10),
            'school_id' => $this->faker->numberBetween(1, 4),
            'category_id' => $this->faker->numberBetween(1, 5),
            'commentaire' => $this->faker->sentences(7),
        ];
    }
}
