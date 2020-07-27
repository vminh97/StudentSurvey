<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = 'student';
    public function branch()
    {
    	return $this->hasMany('App/branch','id_branch','id');
    }
}
