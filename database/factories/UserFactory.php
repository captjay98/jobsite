<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Seeker;
use App\Models\Employer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->name(),
            'lastname' =>  $this->faker->name(),
            'username' =>  $this->faker->unique()->name(),
            'email' =>  $this->faker->unique()->safeEmail(),
            'accounttype' =>  $this->faker->randomElement(['seeker', 'employer']),
            // 'isseeker' =>  $this->faker->boolean(),
            // 'isemployer' =>  $this->faker->boolean(),
            // 'isadmin' =>  $this->faker->boolean(),
            'email_verified_at' => now(),
            'password' => '9876543210', // password
            'remember_token' => Str::random(10),

        ];
    }

    /**
     * Create a new seeker record.
     *
     * @return static
     */
    public function seeker(): static
    {
        return $this->state([
            'accounttype' => 'seeker',
        ]);
    }

    /**
     * Create a new employer record.
     *
     * @return static
     */
    public function employer(): static
    {
        return $this->state([
            'accounttype' => 'employer',
        ]);
    }


    public function afterCreate($user)
    {
        if ($user->accounttype === 'seeker') {
            Seeker::factory()->create([
                'user_id' => $user->id,
            ]);
        } elseif ($user->accounttype === 'employer') {
            Employer::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }


    // public function createUser($accounttype)
    // {
    //     $fact = match($accounttype) {
    //         'seeker' => Seeker::factory()->create(),
    //         'employer' => Employer::factory()->create(),
    //         default => throw new Exception("Invalid account type")
    //     };

    //     return factory($fact)->create();
    // }

    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }


}
