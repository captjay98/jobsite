<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Application;
use App\Models\Job;
use App\Models\Seeker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    protected $model = Application::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seeker_id' => Seeker::inrandomOrder()->first()->id,
            'job_id' => Job::inrandomOrder()->first()->id,
            'status' => 'applied',
            //
        ];
    }
}
