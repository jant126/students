<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use \App\Models\HasCompositePrimaryKey;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'lesson_index', 'course_name',
        'lesson_name','lesson_date','lesson_time','how_long'];
    protected $primaryKey = ['course_id','lesson_index'];
    public $incrementing = false;

}
