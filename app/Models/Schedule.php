<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $primaryKey = ['institution_id','class_id','course_id','teacher_id'];
    public $incrementing = false;
    protected $fillable = ['institution_id','class_id','course_id','teacher_id',
        'has_started','has_cancelled','institution_name','class_name',
        'course_name','teacher_name','classroom_id','classroom_name'];
}
