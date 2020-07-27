<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kssvo extends Model
{
    protected $table = 'kssvo';
    protected $fillable = ['id_stterm','id_survey', 'id_question','id_teacher','id_class', 'answer'];
    public function stterm()
    {
    	return $this->hasMany('App/stterm','id_stterm','id');
    }
    public function question()
    {
    	return $this->hasMany('App/question','id_question','id');
    }
}

