<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;

class DataSekolahAsal extends Model
{
    protected $fillable = [
        'siswa_id', 'tgl_masuk', 'tgl_keluar', 'name', 'alamat', 'no_ijazah', 'rata_rata_nilai', 'no_skhun', 'document'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    
    protected $table = 'data_sekolah_asals';
}
