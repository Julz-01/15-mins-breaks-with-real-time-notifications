<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
       'name', 'email','type', 'password','department','number','type','personal_email','birthdate','birthplace','nationality','religion','tin','sss','philhealth','hdmf','mother_name','father_name','civil_status','training_date','employment_date','linkserve_email','linkserve_skype','img',
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
