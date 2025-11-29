<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;
use App\Models\Teacher;

class Subject extends Model
{
    protected $fillable = [
        'course_id',
        'subject_name',
        'subject_code',
        'credit_hours',
        'teacher_id',
    ];
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
