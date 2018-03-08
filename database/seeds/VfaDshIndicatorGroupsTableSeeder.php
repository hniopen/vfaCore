<?php

use Illuminate\Database\Seeder;

class VfaDshIndicatorGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vfa_dsh_indicator_groups')->delete();
        
        \DB::table('vfa_dsh_indicator_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'indicator group 1',
                'is_displayed' => 1,
            ),
        ));
        
        
    }
}