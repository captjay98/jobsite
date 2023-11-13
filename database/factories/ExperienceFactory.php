<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seeker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
          "Software Developer",
          "Web Developer",
          "Front-end Developer",
          "Back-end Developer",
          "Full-stack Developer",
          "Mobile App Developer",
          "DevOps Engineer",
          "Software Engineer",
          "UI/UX Designer",
          "QA Engineer",
        ];

        $places = ['Microsoft', 'Google', 'Apple', 'Netflix', 'Meta'];
        return [
            "seeker_id" => Seeker::inRandomOrder()->first()->id,
            "title" => $this->faker->randomElement($titles),
            "place" => $this->faker->randomElement($places),
            "from" => $this->faker->date($max = now()->subYears($value = $this->faker->randomDigit())),
            "to" => $this->faker->date($max = now()->subYear())
        ];
    }
}
