<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        $role = Role::where('name', 'super')->first();

        $user = new User();
        $user->name = env('APP_ADMIN_NAME');
        $user->email = env('APP_ADMIN_EMAIL');
        $user->password = bcrypt(env('APP_ADMIN_SECRET'));
        $user->save();
        $user->roles()->attach($role);

    }
  
}