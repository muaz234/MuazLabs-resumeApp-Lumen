<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qualification');
            $table->string('name');
            $table->string('major');
            $table->string('year');
            $table->string('final_score');
            $table->string('institution');
            $table->string('description');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('personal_infos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_history');
    }
}
