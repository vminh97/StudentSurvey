<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kssvt extends Model
{
    protected $table = 'kssvt';
    protected $fillable = ['id_survey','id_student', 'id_question', 'answer'];
    public function student()
    {
    	return $this->hasMany('App/student','id_student','id');
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

