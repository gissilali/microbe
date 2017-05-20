<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
        	['name' => 'Gibson Silali', 'email' => 'silali@admin.com', 'password' => bcrypt('catafalque')]
        	]);
    }
}
