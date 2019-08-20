<?php

use Illuminate\Database\Seeder;

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

        DB::table('groups')->insert([['group_name' => 'student'],['group_name' => 'employee']]);
        DB::table('system_roles')->insert([['role_name' => 'none'],['role_name' => 'beadle'],['role_name' => 'osa'],['role_name' => 'teacher']]);
    }
}
