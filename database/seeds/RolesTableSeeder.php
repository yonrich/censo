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
			'name' => 'Admin',
			'slug' => 'admin',
			'description' => '', // optional
			'level' => 1, // optional, set to 1 by default
		]);
    }
}
