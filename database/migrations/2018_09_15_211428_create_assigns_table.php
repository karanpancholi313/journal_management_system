<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('journal_id');
          $table->unsignedInteger('reviewer_id');
          $table->tinyInteger('status');
          $table->timestamps();
          $table->foreign('journal_id')->references('id')->on('journals');
          $table->foreign('reviewer_id')->references('id')->on('reviewers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigns');
    }
}
