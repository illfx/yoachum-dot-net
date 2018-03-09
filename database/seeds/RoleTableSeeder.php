<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    
    public function run()
    {
        $role = new Role();
        $role->name = 'super';
        $role->description = 'A Super User';
        $role->save();
    }
  
}