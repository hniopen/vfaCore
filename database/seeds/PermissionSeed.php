<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage_users']);//don't change this one, it comes with spatie
        Permission::create(['name' => 'core_access_frontend']);
        Permission::create(['name' => 'core_access_admin']);
        Permission::create(['name' => 'core_view_unreleased']);
        Permission::create(['name' => 'dwsync_create_project']);
        Permission::create(['name' => 'dwsync_sync_data']);
        Permission::create(['name' => 'dwsync_see_data']);
    }
}
