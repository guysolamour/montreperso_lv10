<?php
namespace Database\Seeders;

use App\Models\Background;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BackgroundsTableSeeder extends Seeder
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
            Background::create([

                'name'  => $faker->text(50),
                'description'  => $faker->realText(150),

            ]);

        }
    }
}
