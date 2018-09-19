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

    public function classrooms(){
       return $this->hasMany('App\Models\Classroom');
    }
//通过一对多关联，返回多个teacher模型
    public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function classes(){
        return $this->hasMany('App\Models\SchoolClass');
    }
}
