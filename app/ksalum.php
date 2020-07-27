<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ksalum extends Model
{
    protected $table = 'ksalum';
    protected $fillable = ['id_survey','id_alummi', 'id_question', 'answer'];
    public function alummi()
    {
    	return $this->hasMany('App/alummi','id_alummi','id');
    }
    public function question()
    {
    	return $this->hasMany('App/question','id_question','id');
    }
    public function survey()
    {
    	return $this->hasMany('App/survey','id_survey','id');
    }

}
