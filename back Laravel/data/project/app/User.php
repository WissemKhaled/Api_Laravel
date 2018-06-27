<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $hidden = ['password'];
	protected $guarded = ['password'];
   	public $timestamps = false;

   	public function roles()
	{
    	return $this->belongsToMany('App\Role');
	}
}
