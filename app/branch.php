<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    protected $table = 'branch';
    public function faculty_tables()
    {
    	return $this->hasOne('App/faculty_tables','id_faculty','id');
    }
}
