<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Results;

class Student extends Model
{
    protected $fillable = [
        'student_code','first_name','last_name',
        'gender','dob','email','phone','address',
    ] ;
    public function results()
    {
        return $this->hasMany(Results::class);
    }
}
