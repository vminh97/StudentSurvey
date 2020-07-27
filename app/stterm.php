<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stterm extends Model
{
    protected $table = 'stterm';
    public function student()
    {
    	return $this->hasMany('App/student','id_student','id');
    }
    public function classer()
    {
    	return $this->hasMany('App/classer','id_class','id');
    }
}
