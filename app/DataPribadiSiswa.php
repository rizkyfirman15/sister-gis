<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;

class DataPribadiSiswa extends Model
{
    protected $fillable = [
        'siswa_id', 'no_registrasi_akta', 'agama', 'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kode_pos', 'anak_ke', 'jumlah_saudara_kandung', 'hobby', 'cita_cita', 'parent_email', 'kk', 'akte', 'ijazah', 'raport_terakhir'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    protected $table = 'data_pribadi_siswa';
}
