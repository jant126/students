<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Institution extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institution_name', 'institution_code', 'institution_content',
        'institution_address','institution_legal_person','user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'remember_token',
    ];

    public function show(User $user){
        $institutions = $user->institutions()->paginate(10);
        return view('institutions.show',compact('institutions','user'));
    }
/*
 * 获取一机构的所有教室
 */
    public function classrooms(){
       return $this->hasMany('App\Models\Classroom');
    }
/*
 * 通过一对多关联，获取机构的所有教师
 */
    public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }
/*
 * 获取机构的所有课程
 */
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
/*
 * 获取机构的所有班级
 */
    public function classes(){
        return $this->hasMany('App\Models\SchoolClass');
    }
}
