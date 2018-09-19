<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $primaryKey = ['course_id','teacher_id','class_id'];
    protected $fillable = ['teacher_id', 'course_id', 'class_id',
        'has_started','has_cancelled'];
}
