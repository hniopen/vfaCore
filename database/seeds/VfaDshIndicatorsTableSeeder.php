<?php

use Illuminate\Database\Seeder;

class VfaDshIndicatorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vfa_dsh_indicators')->delete();
        
        \DB::table('vfa_dsh_indicators')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'indicator 1',
                'group_id' => 1,
                'is_displayed' => 1,
            ),
        ));
        
        
    }
}