<?php
use Illuminate\Database\Seeder;
use App\User;
class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Dev',
            'email' => '',
            'password' => //FILL ME IN 
        ]);
        $user->assignRole('acl_admin');
        $user->assignRole('dwsync_admin');
        $user->assignRole('core_register');
        $user->assignRole('dev_admin');
        $user = User::create([
            'name' => 'Admin',
            'email' => '',
            'password' => //FILL ME IN 
        ]);
        $user->assignRole('acl_admin');
        $user->assignRole('dwsync_admin');
        $user->assignRole('core_register');
        $user = User::create([
            'name' => 'Simple user',
            'email' => '',
            'password' => //FILL ME IN 
        ]);
        $user->assignRole('core_register');
        $user = User::create([
            'name' => 'Dw sync',
            'email' => '',
            'password' => //FILL ME IN 
        ]);
        $user->assignRole('dwsync_admin');
        $user = User::create([
            'name' => 'Guest',
            'email' => '',
            'password' => //FILL ME IN 
        ]);
        $user->assignRole('core_visit');
    }
}
