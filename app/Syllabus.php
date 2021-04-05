<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $fillable = ['kelas_id', 'mapel_id', 'syllabus', 'book_indo_siswa', 'book_english_siswa', 'book_indo_guru', 'book_english_guru'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel')->withDefault();
    }

    protected $table = 'syllabus';
}
