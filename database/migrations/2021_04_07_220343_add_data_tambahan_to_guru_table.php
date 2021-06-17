<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataTambahanToGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->string('nama_ibu_kandung', 50)->after('foto');
            $table->text('alamat')->after('nama_ibu_kandung');
            $table->string('rt', 5)->after('alamat');
            $table->string('rw', 5)->after('rt');
            $table->string('kelurahan')->after('rw');
            $table->string('kecamatan')->after('kelurahan');
            $table->string('kode_pos', 7)->after('kecamatan');
            $table->string('nik', 20)->after('number_phone');
            $table->string('no_kk', 20)->after('nik');
            $table->string('no_npwp', 20)->after('no_kk');
            $table->string('nama_wajib_pajak', 50)->after('no_npwp');
            $table->string('agama', 20)->after('nama_wajib_pajak');
            $table->string('kewarganegaraan', 20)->after('agama');
            $table->string('status_perkawinan')->after('kewarganegaraan');
            $table->string('nama_suami_istri', 20)->after('status_perkawinan');
            $table->string('nik_suami_istri', 20)->after('nama_suami_istri');
            $table->string('pekerjaan', 20)->after('nik_suami_istri');
            $table->string('jenis_ptk')->after('pekerjaan');
            $table->string('pendidikan_terakhir', 10)->after('jenis_ptk');
            $table->string('satuan_pendidikan_formal')->after('pendidikan_terakhir');
            $table->string('fakultas')->after('satuan_pendidikan_formal');
            $table->string('thn_masuk')->after('fakultas');
            $table->string('thn_lulus')->after('thn_masuk');
            $table->string('ktp')->after('thn_lulus')->nullable();
            $table->string('kk')->after('ktp')->nullable();
            $table->string('npwp')->after('kk')->nullable();
            $table->string('ijazah')->after('npwp')->nullable();
            $table->string('akte')->after('ijazah')->nullable();
            $table->string('kependidikan')->after('akte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->dropColumn('nama_ibu_kandung');
            $table->dropColumn('alamat');
            $table->dropColumn('rt');
            $table->dropColumn('rw');
            $table->dropColumn('kelurahan');
            $table->dropColumn('kecamatan');
            $table->dropColumn('kode_pos');
            $table->dropColumn('number_phone');
            $table->dropColumn('nik');
            $table->dropColumn('no_kk');
            $table->dropColumn('no_npwp');
            $table->dropColumn('nama_wajib_pajak');
            $table->dropColumn('agama');
            $table->dropColumn('kewarganegaraan');
            $table->dropColumn('status_perkawinan');
            $table->dropColumn('nama_suami_istri');
            $table->dropColumn('nik_suami_istri');
            $table->dropColumn('pekerjaan');
            $table->dropColumn('jenis_ptk');
            $table->dropColumn('pendidikan_terakhir');
            $table->dropColumn('satuan_pendidikan_formal');
            $table->dropColumn('thn_masuk');
            $table->dropColumn('thn_lulus');
            $table->dropColumn('nim');
            $table->dropColumn('ktp');
            $table->dropColumn('kk');
            $table->dropColumn('npwp');
            $table->dropColumn('ijazah');
            $table->dropColumn('akte');
            $table->dropColumn('kependidikan');
        });
    }
}
