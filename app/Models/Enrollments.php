<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_year',
        'status'
    ];

    // Relations
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
