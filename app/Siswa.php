<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\DataPribadiSiswa;
use App\DataAyah;
use App\DataIbu;
use App\DataSekolahAsal;

class Siswa extends Model
{
    use SoftDeletes;

    protected $fillable = ['no_induk', 'user_id', 'nama_siswa', 'kelas_id', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function ulangan($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Ulangan::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function sikap($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Sikap::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function nilai($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Rapot::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function dataPribadi()
    {
        return $this->hasOne(DataPribadiSiswa::class, 'siswa_id');
    }

    public function ayah()
    {
        return $this->hasOne(DataAyah::class, 'siswa_id');
    }

    public function ibu()
    {
        return $this->hasOne(DataIbu::class, 'siswa_id');
    }

    public function sekolah()
    {
        return $this->hasOne(DataSekolahAsal::class, 'siswa_id');
    }

    protected $table = 'siswa';
}
