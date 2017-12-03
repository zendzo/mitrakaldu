<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name' ,
        'email',
        'phone',
        'role_id',
        'profile_id',
        'married_status_id',
        'gender_id',
        'profile_id',
        'active',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make($value);
    }

    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function requirementDocuments()
    {
        return $this->hasMany('App\RequirementDocument','user_id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function marriedStatus()
    {
        return $this->belongsTo('App\MarriedStatus');
    }

    public function rumah()
    {
        return $this->hasOne('App\Rumah');
    }
}
