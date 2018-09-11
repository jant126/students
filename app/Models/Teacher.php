<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'institution_name', 'institution_id', 'teacher_name',
        'teacher_sex','teacher_content','phone','teacher_WeiXinOpenId'];
}
