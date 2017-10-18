<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Seeder;

class ResetURRSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:forget', ['key'=>'spatie.permission.cache']);
        Artisan::call('cache:clear');
        Schema::disableForeignKeyConstraints();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();
    }
}
