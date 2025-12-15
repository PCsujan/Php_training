<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{ use HasFactory;

    // Allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'request',
        'message',
        'attachement',
    ];
}
