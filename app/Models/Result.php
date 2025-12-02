<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

class Result extends Model
{
      protected $fillable = [
        'student_id',
        'exam_id',
        'subject_id',
        'obtained_marks',
        'full_marks',
        'pass_marks',
        'grade',
        'remarks',
    ];

    // Student Relation
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Exam Relation
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    // Subject Relation
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
