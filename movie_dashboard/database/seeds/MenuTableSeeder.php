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
            'name'      => 'Streaming',
            'icon'      => 'fa fa-film',
            'key'       => 'movie',
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
