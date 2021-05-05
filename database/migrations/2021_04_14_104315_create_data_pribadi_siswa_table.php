<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPribadiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pribadi_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('siswa_id');
            $table->unsignedBigInteger('siswa_id');
            $table->string('no_registrasi_akta', 15);
            $table->string('agama');
            $table->string('alamat');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->string('anak_ke', 2);
            $table->integer('jumlah_saudara_kandung');
            $table->string('hobby');
            $table->string('cita_cita');
            $table->string('parent_email');
            // $table->string('siswa_email');
            $table->string('kk');
            $table->string('akte');
            $table->string('ijazah');
            $table->string('raport_terakhir');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pribadi_siswa');
    }
}
