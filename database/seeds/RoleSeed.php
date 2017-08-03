<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default admin
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('manage_users');
        $role->givePermissionTo('access_front_end');

        //Simple user
        $role = Role::create(['name' => 'simple_user']);
        $role->givePermissionTo('access_front_end');
    }
}
