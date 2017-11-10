<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDwSubmissionValueregsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dw_submission_valueregs');
        Schema::create('dw_submission_valueregs', function (Blueprint $table) {
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
        Schema::drop('dw_submission_valueregs');
    }
}
