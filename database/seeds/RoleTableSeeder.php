<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    
    public function run()
    {
        //
         Role::create(['role_name' => ('superadmin')]);
         Role::create(['role_name' => ('admin')]);
         Role::create(['role_name' => ('scanner')]);
    }
}
