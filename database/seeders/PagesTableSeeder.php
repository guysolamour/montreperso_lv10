<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Guysolamour\Administrable\Models\PageMeta;


class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        $home_page = config('administrable.modules.page.model')::create([
            'code'   => 'home',
            'name'   => 'Accueil',
            'route'  => 'home',
        ]);

        /**
         * @var \Guysolamour\Administrable\Models\Page $home_page
         */
        $home_page->generateSeo(false);



        $contact_page = config('administrable.modules.page.model')::create([
            'code'   => 'contact',
            'name'   => 'Contact',
            'route'  => 'front.contact.create',
        ]);

        /**
         * @var \Guysolamour\Administrable\Models\Page $contact_page
         */
        $contact_page->generateSeo(false);


        $mention_page = config('administrable.modules.page.model')::create([
            'code'   => 'legalmention',
            'name'   => 'Mentions légales',
            'route'  => 'front.legalmention.index',
        ]);

        /**
         * @var \Guysolamour\Administrable\Models\Page $mention_page
         */
        $mention_page->generateSeo(false);


        $about_page = config('administrable.modules.page.model')::create([
            'code'   => 'about',
            'name'   => 'A propos',
            'route'  => 'front.about.index',
        ]);
        /**
        * @var \Guysolamour\Administrable\Models\Page $about_page
        */
        $about_page->generateSeo(false);

        $blog_page = config('administrable.modules.page.model')::create([
            'code'   => 'blog',
            'name'   => 'Blog',
            'route'  => 'front.post.index',
        ]);
        /**
        * @var \Guysolamour\Administrable\Models\Page $blog_page
        */
        $blog_page->generateSeo(false);


        $search_page = config('administrable.modules.page.model')::create([
            'code'   => 'search',
            'name'   => 'Recherche',
            'route'  => 'front.post.search',
        ]);
        /**
        * @var \Guysolamour\Administrable\Models\Page $search_page
        */
        $search_page->generateSeo(false);
    }
}
