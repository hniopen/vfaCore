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
        //can dev admin
        $role = Role::create(['name' => 'dev_admin']);
        $role->givePermissionTo('core_view_unreleased');

        //can admin acl
        $role = Role::create(['name' => 'acl_admin']);
        $role->givePermissionTo('manage_users');

        //can admin dwsync
        $role = Role::create(['name' => 'dwsync_admin']);
        $role->givePermissionTo('dwsync_create_project');
        $role->givePermissionTo('dwsync_sync_data');
        $role->givePermissionTo('dwsync_see_data');

        //can admin vfadashboard
        $role = Role::create(['name' => 'vfadashboard_admin']);
        $role->givePermissionTo('manage_vfadashboard');

        //can run sync dwsync
        $role = Role::create(['name' => 'dwsync_run_sync']);
        $role->givePermissionTo('core_access_admin');
        $role->givePermissionTo('dwsync_sync_data');
        $role->givePermissionTo('dwsync_see_data');

        //can register
        $role = Role::create(['name' => 'core_register']);
        $role->givePermissionTo('core_access_frontend');
        $role->givePermissionTo('core_access_admin');

        //Feature flag
        $role = Role::create(['name' => 'feature_flag_manager']);
        $role->givePermissionTo('manage_feature_flag');

        //can visit
        $role = Role::create(['name' => 'core_visit']);
        $role->givePermissionTo('core_access_frontend');
    }
}
