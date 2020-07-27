<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $table = 'subject';
    public function faculty_tables()
    {
    	return $this->hasOne('App/faculty_tables','id_faculty','id');
    }
}
