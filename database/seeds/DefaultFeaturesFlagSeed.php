<?php

use Illuminate\Database\Seeder;
use AlfredNutileInc\LaravelFeatureFlags;
class DefaultFeaturesFlagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Example
//        $feature = new LaravelFeatureFlags\FeatureFlag();
//        $feature->key = 'add-twitter-field';
//        $feature->variants = [ 'users' => ['alfrednutile@gmail.com'] ];
//        $feature->save();

        $feature = new LaravelFeatureFlags\FeatureFlag();
        $feature->key = 'feature_acl';//URR
        $feature->variants = "on";
        $feature->save();

        $feature = new LaravelFeatureFlags\FeatureFlag();
        $feature->key = 'feature_dw_sync';//dwsync package
        $feature->variants = "on";
        $feature->save();

        $feature = new LaravelFeatureFlags\FeatureFlag();
        $feature->key = 'feature_vfa_dashboard';//vfaDashboad package
        $feature->variants = "on";
        $feature->save();
    }
}
