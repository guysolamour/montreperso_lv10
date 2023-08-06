<?php
namespace Database\Seeders;

use App\Models\Bracelet;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BraceletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        Bracelet::create([
            'name'   => "Noir",
            'value'  => "#000000",
        ]);
        Bracelet::create([
            'name'   => "Marron",
            'value'  => "#a52b2b",
        ]);
        Bracelet::create([
            'name'   => "Rouge",
            'value'  => "#ff0000",
        ]);
        Bracelet::create([
            'name'   => "Bleu",
            'value'  => "#0b7bcd",
        ]);
        Bracelet::create([
            'name'   => "Vert",
            'value'  => "#0a8d0a",
        ]);
        Bracelet::create([
            'name'   => "Blanc",
            'value'  => "#ffffff",
        ]);

    }
}
