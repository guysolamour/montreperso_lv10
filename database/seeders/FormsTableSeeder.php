<?php
namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class FormsTableSeeder extends Seeder
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
            Form::create([

                'type_id'  => $faker->text(),

                'name'  => $faker->text(50),
                'description'  => $faker->realText(150),
                'index_id'  => $faker->text(),

            ]);

        }
    }
}
