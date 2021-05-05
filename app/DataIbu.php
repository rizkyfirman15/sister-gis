<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;

class DataIbu extends Model
{
    protected $fillable = [
        'siswa_id', 'name', 'nik', 'tmp_lahir', 'tgl_lahir', 'pendidikan', 'pekerjaan', 'agama', 'number_phone', 'penghasilan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    protected $table = 'data_ibus';
}
