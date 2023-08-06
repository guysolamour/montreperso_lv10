<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call(BraceletsTableSeeder::class);
         $this->call(TypesTableSeeder::class);
        
         $this->call(DesignsTableSeeder::class);
         $this->call(DesignCategoriesTableSeeder::class);
        
         $this->call(FontsTableSeeder::class);
         $this->call(BackgroundsTableSeeder::class);
         $this->call(IndicesTableSeeder::class);
         $this->call(FormsTableSeeder::class);
         $this->call(IndicatorsTableSeeder::class);
        
         $this->call(UsersTableSeeder::class);
         $this->call(WatchesTableSeeder::class);
         $this->call(AdminsTableSeeder::class);
         $this->call(PagesTableSeeder::class);
         $this->call(ConfigurationsTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
