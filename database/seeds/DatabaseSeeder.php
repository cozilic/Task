<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new App\User();
        $user->name = 'Patrik Forsberg';
        $user->username = '85088';
        $user->user_level = '1';
        $user->district = '7423';
        $user->password = Hash::make('secret');
        $user->save();

        $user = new App\User();
        $user->name = 'Tomas Palm';
        $user->username = '80542';
        $user->user_level = '1';
        $user->district = '7423';
        $user->password = Hash::make('secret');
        $user->save();

        $district = new App\District();
        $district->name = 'Umeå';
        $district->number = '7423';
        $district->save();



        factory(App\Task::class, 10)->create();
    }


}
