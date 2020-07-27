<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personcompany extends Model
{
    protected $table = 'personcompany';
    public function company()
    {
    	return $this->hasOne('App/company','id_company','id');
    }
    
}
