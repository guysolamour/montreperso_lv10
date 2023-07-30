<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\PermissionRegistrar;
use Creativeorange\Gravatar\Facades\Gravatar;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $guard = config('administrable.guard');

        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => $guard, 'name' => 'editor']);
        $role2 = Role::create(['guard_name' => $guard, 'name' =>  $guard]);
        $role3 = Role::create(['guard_name' => $guard, 'name' => "super-{$guard}"]);


        $guard = get_guard_model_class()::create([
            'pseudo'        => 'AswebAgency',
            'first_name'    => 'Guy-roland',
            'last_name'     => 'ASSALE',
            'email'         => $email = 'rolandassale@aswebagency.com',
            'avatar'        => Gravatar::get($email),
            'password'      => '12345678',
            'facebook'      => "https://roland-assale.info/facebook",
            'twitter'       => "https://roland-assale/twitter",
            'linkedin'      => "https://roland-assale/linkedin",
            'phone_number'  => "+225 48 39 37 73",
            'website'       => 'https://roland-assale.info',
            'about'         => "
                Je suis Guy-roland ASSALE, passionné d'informatique et de nouvelles technologies, fondateur de la société AswebAgency. Je suis depuis de nombreuses années dans le domaine du développement web et des réseaux sociaux. J'aime expérimenter, découvrir et apprendre au fur et à mesure de mes projets pro et perso. Je réalise vos projets avec soin et professionnalisme afin de fournir un service de qualité. En recherche permanente de projet de tous domaines, contactez-moi pour discuter du vôtre.
            ",
        ]);

        $guard->assignRole($role3);

        for ($i = 1; $i < 5; $i++) {
            $guard = get_guard_model_class()::create([
              'pseudo'       => $faker->userName,
              'first_name'   => $faker->firstName,
              'last_name'    => $faker->lastName,
              'email'        => $email = $faker->email,
              'avatar'       => Gravatar::get($email),
              'password'     => '12345678',
              'facebook'     => $faker->url,
              'twitter'      => $faker->url,
              'linkedin'     => $faker->url,
              'phone_number' => $faker->phoneNumber,
              'website'      => $faker->url,
              'about'        => $faker->realText(),
            ]);

            $role = 'role' . rand(1,2);

            $guard->assignRole($$role);
        }
    }
}
