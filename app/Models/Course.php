<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_name', 'institution_id', 'course_name',
        'course_count','course_content','has_lessons'];
    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Course');
    }

}
