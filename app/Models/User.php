<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','role','creator_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
    /**
     * 获取指定用户的所有教室
     */
    public function classrooms()
    {
        return $this->hasManyThrough('App\Models\Classroom', 'App\Models\Institution');
    }

    /**
     * 获取指定用户的所有班级
     */
    public function schoolclasses()
    {
        return $this->hasManyThrough('App\Models\SchoolClass', 'App\Models\Institution');
    }

    /**
     * 获取指定用户的所有课程
     */
    public function courses()
    {
        return $this->hasManyThrough('App\Models\Course', 'App\Models\Institution');
    }

    /**
     * 获取指定用户的所有教师
     */
    public function teachers()
    {
        return $this->hasManyThrough('App\Models\Teacher', 'App\Models\Institution');
    }

    /**
     * 获取指定用户的所有学生
     */
    public function students()
    {
        return $this->hasManyThrough('App\Models\Student', 'App\Models\Institution');
    }

    public static function createUser($name,$phone,$role,$creator_id)
    {
      $user =  User::create([
            'name' => $name,
            'email' => $phone,
            'password' => bcrypt( '123456'),
            'phone' => $phone,
            'role' => $role,
            'is_admin' => false,
            'creator_id' =>$creator_id
        ]);
    }
    public static function deleteUser($phone)
    {
         User::where('phone','=',$phone)->delete();
    }

    public static function updateUser($name,$phone,$oldPhone){
        User::where('phone','=',$oldPhone)->update([
            'name' => $name, 'phone' => $phone, 'email' => $phone
        ]);
    }

    const   TeacherUser = '教师用户';
    const   StudentUser = '家长用户';

}
