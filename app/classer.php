<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classer extends Model
{
    protected $table = 'class';
    public function term()
    {
    	return $this->hasMany('App/term','id_term','id');
    }
}
