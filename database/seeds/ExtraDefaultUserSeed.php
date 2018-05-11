<?php

use Illuminate\Database\Seeder;
use App\User;

class ExtraDefaultUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add extra default user : QA, PM, Dev, etc

//        $user = User::create([
//            'name' => 'Dev',
//            'email' => 'dev@admin.com',
//            'password' => bcrypt('dev')
//        ]);
//        $user->assignRole('acl_admin');
//        $user->assignRole('dwsync_admin');
//        $user->assignRole('core_register');
//        $user->assignRole('dev_admin');
//        $user->assignRole('vfadashboard_admin');
//        $user->assignRole('feature_flag_manager');
//
//        $user = User::create([
//            'name' => 'Admin',
//            'email' => '***REMOVED***',
//            'password' => bcrypt('admin')
//        ]);
//        $user->assignRole('acl_admin');
//        $user->assignRole('dwsync_admin');
//        $user->assignRole('core_register');
//        $user->assignRole('vfadashboard_admin');
//        $user->assignRole('feature_flag_manager');
//
//        $user = User::create([
//            'name' => 'Simple user',
//            'email' => 'simpleuser@admin.com',
//            'password' => bcrypt('simpleuser')
//        ]);
//        $user->assignRole('core_register');
//
//        $user = User::create([
//            'name' => 'Dw sync',
//            'email' => 'dwsync@admin.com',
//            'password' => bcrypt('dwsync')
//        ]);
//        $user->assignRole('dwsync_admin');
//
//        $user = User::create([
//            'name' => 'Guest',
//            'email' => 'guest@admin.com',
//            'password' => bcrypt('guest')
//        ]);
//        $user->assignRole('core_visit');
    }
}
