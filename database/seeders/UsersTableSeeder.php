<?php
namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            User::create([
                'name'              => $faker->name,
                'pseudo'            => $faker->userName,
                'email'             => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password'          => bcrypt('12345678'),
                'remember_token'    => Str::random(10),
            ]);
        }
    }
}
