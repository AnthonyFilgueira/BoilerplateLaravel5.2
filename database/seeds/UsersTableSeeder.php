<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	factory(User::class)->create([
        	'name'=>'Admin',
        	'last_name' =>'Test',
        	'email'=> 'admin@test.com',
        	'role'=>'admin'
        ]);
        factory(User::class)->create([
            'name'=>'Client',
            'last_name' =>'Test',
            'email'=> 'client@test.com',
            'role'=>'client'
        ]);
    }
}
