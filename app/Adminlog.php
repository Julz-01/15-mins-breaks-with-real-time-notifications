<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminlog extends Model
{
    protected $fillable = ['admin_id','admin_name','date' ,'time_in', 'time-out','time_total',];
}
