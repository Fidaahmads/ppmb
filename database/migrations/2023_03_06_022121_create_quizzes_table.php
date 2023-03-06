<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('group_id')->nullable();
            $table->text('quizz')->nullable();
            $table->text('opsi1')->nullable();
            $table->text('opsi2')->nullable();
            $table->text('opsi3')->nullable();
            $table->text('opsi4')->nullable();
            $table->integer('answer')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizzes');
    }
}
