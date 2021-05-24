<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_card', 'nama_guru', 'mapel_id', 'kode', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto', 'nama_ibu_kandung', 'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kode_pos', 'nik', 'no_kk', 'no_npwp', 'nama_wajib_pajak', 'agama', 'kewarganegaraan', 'status_perkawinan', 'nama_suami_istri', 'nik_suami_istri', 'pekerjaan', 'jenis_ptk', 'pendidikan_terakhir', 'satuan_pendidikan_formal', 'fakultas', 'thn_masuk', 'thn_lulus', 'ktp', 'kk', 'npwp', 'ijazah', 'akte', 'kependidikan'];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel')->withDefault();
    }

    public function dsk($id)
    {
        $dsk = Nilai::where('guru_id', $id)->first();
        return $dsk;
    }

    protected $table = 'guru';
}
