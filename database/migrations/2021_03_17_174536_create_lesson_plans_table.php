<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mapel_id');
            $table->integer('kelas_id');
            $table->string('teaching_strategy');
            $table->string('metode');
            $table->string('hot');
            $table->integer('time_alocation');
            $table->string('semester');
            $table->text('learning_objective');
            $table->text('learning_activities');
            $table->text('assessment');
            $table->string('student_book');
            $table->string('websik');
            $table->string('other');
            $table->string('ppt');
            $table->string('study_note');
            $table->string('lks');
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
        Schema::dropIfExists('lesson_plans');
    }
}
