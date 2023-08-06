<?php
namespace Database\Seeders;

use App\Models\DesignCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DesignCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // for ($i = 0; $i < 15; $i++) {
        //     DesignCategory::create([
        //         'name'  => $faker->text(50),
        //         'price'  => $faker->text(50),
        //         'description'  => $faker->realText(150),
        //         'design_id'  => $faker->text(),
        //     ]);

        // }

        DesignCategory::create([
            'name'  => $faker->text(50),
            'price'  => $faker->text(50),
            'description'  => $faker->realText(150),
            'design_id'  => $faker->text(),
        ]);
    }
}
