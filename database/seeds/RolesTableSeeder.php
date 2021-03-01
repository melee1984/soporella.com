<?php

use Illuminate\Database\Seeder;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$user = User::find(1);
		
		// Creating Roles 
		Spatie\Permission\Models\Role::create(['name' => 'admin']);

		// Assigning roles to user admin 
		$user->assignRole('admin');
    }
}
