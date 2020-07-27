<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table = 'question';
    public function survey()
    {
    	return $this->hasMany('App/survey','id_survey','id');
    }
}
