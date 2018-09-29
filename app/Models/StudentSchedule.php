<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    //
    protected $primaryKey = ['student_id','schedule_id'];
    public $incrementing = false;
    protected $fillable = ['student_id','schedule_id','institution_id','class_id','course_id',
        'teacher_id','institution_name','class_name',
        'course_name','teacher_name','classroom_id','classroom_name','student_name'];
}
