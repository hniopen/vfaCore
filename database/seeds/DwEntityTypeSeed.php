<?php

use Illuminate\Database\Seeder;
use App\Models\Dwsync\DwEntityType;

class DwEntityTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default types
        DwEntityType::create(['type' => 'Q', 'comment'=>'Questionnaire', 'apiUrl' => 'https://app.datawinners.com/feeds/']);
        DwEntityType::create(['type' => 'I', 'comment'=>'Idnr', 'apiUrl' => 'https://app.datawinners.com/api/get_for_form/']);
        DwEntityType::create(['type' => 'DS', 'comment'=>'Datasender', 'apiUrl' => 'https://app.datawinners.com/api/get_for_form/']);
    }
}
