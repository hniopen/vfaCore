<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDwSubmissionValuevilsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dw_submission_valuevils');
        Schema::create('dw_submission_valuevils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('questionId')->nullable();
            $table->string('submissionId', 50);
            $table->string('xformQuestionId')->nullable();
            $table->text('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dw_submission_valuevils');
    }
}
