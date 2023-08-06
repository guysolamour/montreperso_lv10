<?php
namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TypesTableSeeder extends Seeder
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
            Type::create([

                'name'  => $faker->text(50),
                'description'  => $faker->realText(150),

            ]);

        }
    }
}
