<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'teacher_code','first_name','last_name',
        'email','phone','qualification','address'
    ];
}
