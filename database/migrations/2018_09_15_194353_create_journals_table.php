<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email');
          $table->string('administration');
          $table->string('department');
          $table->string('author');
          $table->string('title');
          $table->string('description');
          $table->date('journal_date');
          $table->unsignedInteger('user_id');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
