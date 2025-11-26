<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_name',
        'course_id',
        'teacher_id'
    ];
    // Course relationship
    public function course()  // lowercase, not Courses
    {
        return $this->belongsTo(\App\Models\Courses::class, 'course_id'); // foreign key
    }
    // Teacher relationship
    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
}
