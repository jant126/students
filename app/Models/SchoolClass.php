<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    //
    protected $table = 'school_classes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_name', 'institution_id', 'class_name',
        'class_count','class_content','class_start','class_end'];
}
