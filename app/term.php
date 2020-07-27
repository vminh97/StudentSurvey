<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class term extends Model
{
    protected $table = 'term';
    public function branch()
    {
    	return $this->hasMany('App/branch','id_branch','id');
    }
}
