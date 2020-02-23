<?php

namespace App;

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
      'name', 'email', 'password','department','team_leader','employee_type','number','personal_email','birthdate','birthplace','nationality','religion','tin','sss','philhealth','hdmf','mother_name','father_name','civil_status','training_date','employment_date','linkserve_email','linkserve_skype','img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
