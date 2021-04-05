<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonPlan extends Model
{
    protected $fillable = [
        'kelas_id', 'mapel_id', 'teaching_strategy', 'metode', 'hot', 'time_alocation', 'semester', 'learning_objective', 'learning_activities', 'assessment', 'student_book', 'websik', 'other', 'ppt', 'study_note', 'lks'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel')->withDefault();
    }

    protected $table = 'lesson_plans';
}
