<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
	    		'id' => 1,
	    		'name' => 'Super Admin',
	            'email' => 'admin',
	    		'password' => Hash::make('admin'),
	            'email_verified_at' => \Carbon\Carbon::now(),
	    		'created_at' => \Carbon\Carbon::now(),
	            'updated_at' => \Carbon\Carbon::now(),
	    	]
        ]);
    }
}
