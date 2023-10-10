<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $jobTitles = [
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


        $jobDescriptions = [
            "Design and develop software applications.",
            "Create and maintain websites and web applications.",
            "Focus on building user interfaces and client-side functionality.",
            "Handle server-side logic and database management.",
            "Work on both front-end and back-end development tasks.",
            "Develop mobile applications for iOS and Android.",
            "Manage infrastructure and automate deployment processes.",
            "Design, build, and maintain software systems.",
            "Create user interfaces and improve user experience.",
            "Ensure software quality through testing and debugging.",
        ];


        $industries = [
            "Information Technology",
            "Software Development",
            "E-commerce",
            "Healthcare",
            "Finance",
            "Gaming",
            "Telecommunications",
            "Education",
            "Entertainment",
            "Consulting",
        ];


        $salaryRanges = [
            "$60,000 - $80,000",
            "$80,000 - $100,000",
            "$100,000 - $120,000",
            "$120,000 - $140,000",
            "$140,000 - $160,000",
            "$160,000 - $180,000",
            "$180,000 - $200,000",
            "$200,000 - $220,000",
            "$220,000 - $240,000",
            "Above $240,000",
        ];


        return [
            "employer_id" => Employer::inRandomOrder()->first()->id,
            'title' => $this->faker->randomElement($jobTitles),
            'description' => $this->faker->randomElement($jobDescriptions),
            'industry' => $this->faker->randomElement($industries),
            'salary' => $this->faker->randomElement($salaryRanges),
            'city' => $this->faker->city(),

            //
        ];
    }
}
