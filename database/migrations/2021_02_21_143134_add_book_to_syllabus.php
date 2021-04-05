<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookToSyllabus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('syllabus', function (Blueprint $table) {
            $table->string('book_indo_siswa')->after('syllabus');
            $table->string('book_english_siswa')->after('book_indo_siswa');
            $table->string('book_indo_guru')->after('book_english_siswa');
            $table->string('book_english_guru')->after('book_indo_guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('syllabus', function (Blueprint $table) {
            $table->dropColumn('book_indo_siswa');
            $table->dropColumn('book_english_siswa');
            $table->dropColumn('book_indo_guru');
            $table->dropColumn('book_english_guru');
        });
    }
}
