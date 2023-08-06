<?php
namespace Database\Seeders;

use App\Models\Index;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class IndicesTableSeeder extends Seeder
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
            Index::create([

                'name'  => $faker->text(50),
                'description'  => $faker->realText(150),

            ]);

        }
    }
}
