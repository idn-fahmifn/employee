<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = 'Admin';
        $user->username = 'adminutama';
        $user->level = 'admin';
        $user->password = bcrypt('asdasdasd');
        $user->save();
    }
}
