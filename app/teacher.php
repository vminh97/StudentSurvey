<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $table = 'teacher';
    public function subject()
    {
    	return $this->hasMany('App/subject','id_subject','id');
    }
}
