<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kste extends Model
{
    protected $table = 'kste';
    protected $fillable = ['id_survey','id_teacher', 'id_question', 'answer'];
    public function teacher()
    {
    	return $this->hasMany('App/teacher','id_teacher','id');
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
