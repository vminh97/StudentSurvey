<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teterm extends Model
{
    protected $table = 'teterm';
    public function subject()
    {
    	return $this->hasMany('App/subject','id_subject','id');
    }
}
