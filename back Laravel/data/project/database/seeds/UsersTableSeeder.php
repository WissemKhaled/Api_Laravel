<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'wissem',
                'password' => bcrypt('0000'),
            ],
            [
                'name' => 'Eva',
                'password' => bcrypt('KABOOM'),
            ]
     ]);
         DB::table('role_user')->insert([
            [
                'role_id' => 1,
                'user_id' => 1
            ],
            [
                'role_id' => 3,
                'user_id' => 2
            ],
        ]);
    }
}
