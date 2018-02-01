<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
    	return $this->hasMany('App\Course');
    }

    public function scopeSearch($query, $s)
    {
    	return $query->where('firstname', 'like', '%'.$s.'%')->orWhere('lastname', 'like', '%'.$s.'%');
    }
}
