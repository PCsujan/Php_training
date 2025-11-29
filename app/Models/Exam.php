<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
       protected $fillable = [
        'exam_name',
        'course_id',
        'exam_year',
        'exam_term',
        'start_date',
        'end_date',
    ];

    // Relationship: An exam belongs to one course
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
