<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seeker;
use App\Models\User;
use App\Models\Skill;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SeekerFactory extends Factory
{
    protected $model = Seeker::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $skills = [];
        $professions = [
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



        return [
            'user_id' => function () {
                return User::Factory()->create(
                    ['account_type' => "seeker"]
                )->id;
            },
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->county(),
            'state' => $this->faker->region(),
            'country' => $this->faker->country(),
            'dateofbirth' => $this->faker->date(),
            'skills' => Skill::inRandomOrder()->first()->id,
            'profession' => $this->faker->randomElement($professions),
            'ethnicity' => $this->faker->randomElement(['African American', 'Asian', 'Caucasian', 'Hispanic', 'Native American', 'Other']),
                       'cv' => $this->faker->word(),
            'visa' => $this->faker->word(),
            'passport' => $this->faker->word(),
        ];
    }
}


// 'qualifications' => [
//                ['title' => 'BSc', 'from' => '2010', 'to' => '2015'],
//                ['title' => 'MSc', 'from' => '2016', 'to' => '2018']
//            ],
//            'experiences' => [
//                ['title' => 'FullStack Dev', 'from' => '2019', 'to' => '2020', 'at' => "FiFi Imagination"],
//                ['title' => 'MSc', 'from' => '2021', 'to' => '2022', 'at' => "Another Banger"]
//            ],
