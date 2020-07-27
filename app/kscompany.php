<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kscompany extends Model
{
    protected $table = 'kscompany';
    protected $fillable = ['id_survey','id_personcom', 'id_question', 'answer'];
    public function person_company()
    {
    	return $this->hasMany('App/person_company','id_personcom','id');
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
