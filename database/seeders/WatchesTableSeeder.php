<?php
namespace Database\Seeders;

use App\Models\Watch;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class WatchesTableSeeder extends Seeder
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
            Watch::create([

                'name'  => $faker->text(50),
                'description'  => $faker->realText(150),
                'form_id'  => $faker->text(),
                'index_id'  => $faker->text(),
                'index_image_id'  => $faker->randomNumber(),
                'indicator_id'  => $faker->text(),
                'brackground_id'  => $faker->text(),
                'brackground_image_id'  => $faker->randomNumber(),
                'bracelet_id'  => $faker->text(),
                'design_id'  => $faker->text(),
                'design_category_id'  => $faker->text(),
                'user_id'  => $faker->text(),
                'text'  => $faker->realText(150),
                'background'  => $faker->realText(150),

            ]);

        }
    }
}
