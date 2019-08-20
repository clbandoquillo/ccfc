<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'system_role_id' => 'int'
    ];

    protected $appends = ['user_code'];

    public function getUserCodeAttribute(){
        return substr($this->attributes['employee_id'],-7,6);
    }

    public function subjects(){
        return $this->hasMany(\App\RegisteredSubject::class,'STUDENTCODE','student_code');
    }
}
