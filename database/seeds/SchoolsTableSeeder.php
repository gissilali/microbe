<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->delete();
        DB::table('schools')->insert([
        	['name' => 'Biological and Physical Sciences'],
        	['name' => 'Information Sciences'],
        	['name' => 'Human Resources'],
        	['name' => 'Education'],
        	['name' => 'Law'],
        	['name' => 'Arts and Social Sciences']
        	]);
    }
}
