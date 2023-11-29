<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seeker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            "BSc",
            "MSc",
            "Diploma",
            "Certificate",
            "HND",
            "Developer",
            "Engineer",
            "Designer",
        ];


        return [
            "seeker_id" => Seeker::inRandomOrder()->first()->id,
            "title" => $this->faker->randomElement($titles),
            "from" => $this->faker->year($max = now()->subYears($value = 4)),
            "to" => $this->faker->year($max = now()->subYear())
        ];
    }
}
