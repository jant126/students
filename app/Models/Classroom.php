<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_name', 'institution_id', 'classroom_name',
        'classroom_address','classroom_content'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
