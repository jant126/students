<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'institution_name', 'institution_id', 'teacher_name',
        'teacher_sex','teacher_content','phone','teacher_WeiXinOpenId'];

    const Dimission = '离职';
    const InService = '在职';
    public function institution()
    {
        return $this->belongsTo('institutions');
    }
}
