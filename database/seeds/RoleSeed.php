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
        $role->givePermissionTo('core_manage_users');
        $role->givePermissionTo('core_access_frontend');
        $role->givePermissionTo('dwsync_create_project');
        $role->givePermissionTo('dwsync_sync_data');
        $role->givePermissionTo('dwsync_see_data');

        //Simple user
        $role = Role::create(['name' => 'simple_user']);
        $role->givePermissionTo('core_access_frontend');

        //Dw client admin : sync only
        $role = Role::create(['name' => 'dwsync_client']);
        $role->givePermissionTo('dwsync_sync_data');
        $role->givePermissionTo('dwsync_see_data');
    }
}
