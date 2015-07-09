<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('poll_id')->unsigned();
            $table->integer('voter_id')->unsigned();


            $table->smallInteger('ratio');
            $table->timestamps();
            
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
            $table->foreign('voter_id')->references('id')->on('voters')->onDelete('cascade');
        });

        Schema::create('research_proposal',function (Blueprint $table){
            $table->integer('research_id')->unsigned()->index();
            $table->foreign('research_id')->references('id')->on('researches')->onDelete('cascade');

            $table->integer('proposal_id')->unsigned()->index();
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');

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
        Schema::drop('researches');
        Schema::drop('research_proposal');
    }
}
