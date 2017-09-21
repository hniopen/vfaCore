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
        DwEntityType::create(['type' => 'Q', 'apiUrl' => 'https://app.datawinners.com/feeds/']);//Questionnaire
        DwEntityType::create(['type' => 'I', 'apiUrl' => 'https://app.datawinners.com/api/get_for_form/']);//Idnr
        DwEntityType::create(['type' => 'DS', 'apiUrl' => 'https://app.datawinners.com/api/get_for_form/']);//Datasender
    }
}
