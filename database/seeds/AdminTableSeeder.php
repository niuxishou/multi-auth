<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => bcrypt('roomsalon'),
        ]);
    }
}
