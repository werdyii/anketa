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
        Schema::create('research', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ankets_id')->unsigned();
            $table->integer('voters_id')->unsigned();
            $table->integer('proposals_id')->unsigned();

            $table->smallInteger('ratio');
            $table->timestamps();
            
            $table->foreign('ankets_id')->references('id')->on('ankets')->onDelete('cascade');
            $table->foreign('voters_id')->references('id')->on('voters')->onDelete('cascade');
            $table->foreign('proposals_id')->references('id')->on('proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('research');
    }
}
