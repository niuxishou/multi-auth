<?php

use Illuminate\Database\Seeder;

class StylistAdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stylist_admins')->truncate();

        DB::table('stylist_admins')->insert([
            'name' => 'スタイリスト管理者',
            'email' => 'stylistadmin@example.com',
            'password' => bcrypt('roomsalon'),
        ]);
    }
}
