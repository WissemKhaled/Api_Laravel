<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
         'name' => 'admin'
     ]);
        DB::table('roles')->insert([
         'name' => 'SuperAdmin'
     ]);
        DB::table('roles')->insert([
         'name' => 'Editor'
     ]);
        DB::table('roles')->insert([
         'name' => 'User'
     ]);
        DB::table('roles')->insert([
         'name' => 'Visitor'
     ]);
    }
}
