<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'institution_name', 'institution_id','student_number','student_name',
        'student_age','student_sex','student_id', 'student_join_date',
        'phone','student_mother_name','student_mother_phone',
        'student_mother_WeiXinOpenId','student_father_name',
        'student_father_phone','student_father_WeiXinOpenId',
        ];
}
