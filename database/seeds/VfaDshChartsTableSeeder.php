<?php

use Illuminate\Database\Seeder;

class VfaDshChartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vfa_dsh_charts')->delete();
        
        \DB::table('vfa_dsh_charts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'chart1',
                'indicator_id' => 1,
                'is_displayed' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Chart2',
                'indicator_id' => 1,
                'is_displayed' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Chart3',
                'indicator_id' => 1,
                'is_displayed' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'chart4',
                'indicator_id' => 1,
                'is_displayed' => 1,
            ),
        ));
        
        
    }
}