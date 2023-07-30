<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pseudo'             => $this->faker->userName,
            'name'               => $this->faker->name,
            'email'              => $this->faker->unique()->safeEmail,
            'email_verified_at'  => now(),
            'is_super_admin' => true,
            'password'           => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'     => Str::random(10),
            'twitter'            => $this->faker->url,
            'facebook'           => $this->faker->url,
            'linkedin'           => $this->faker->url,
            'phone_number'       => $this->faker->phoneNumber,
            'website'            => $this->faker->url,
            'about'              => $this->faker->realText(),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
