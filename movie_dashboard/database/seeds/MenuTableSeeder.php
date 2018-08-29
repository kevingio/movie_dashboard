<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name'      => 'Home',
            'icon'      => 'icon-home',
            'key'       => 'home',
        ]);

        DB::table('menus')->insert([
            'name'      => 'Movie Streaming',
            'icon'      => 'fa fa-film',
            'key'       => 'movie',
        ]);

        DB::table('menus')->insert([
            'name'      => 'Facebook',
            'icon'      => 'fa fa-facebook',
            'key'       => 'facebook',
        ]);

        DB::table('menus')->insert([
            'name'      => 'Instagram',
            'icon'      => 'fa fa-instagram',
            'key'       => 'instagram',
        ]);

        DB::table('menus')->insert([
            'name'      => 'Twitter',
            'icon'      => 'fa fa-twitter',
            'key'       => 'twitter',
        ]);

        DB::table('menus')->insert([
            'name'      => 'Youtube',
            'icon'      => 'fa fa-youtube-play',
            'key'       => 'youtube',
        ]);
    }
}
