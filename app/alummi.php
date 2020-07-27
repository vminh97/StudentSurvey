<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alummi extends Model
{
    protected $table = 'alummi';
    public function branch()
    {
    	return $this->hasMany('App/branch','id_branch','id');
    }
}
