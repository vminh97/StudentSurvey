<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentclass extends Model
{
    protected $table = 'stterm';
    public function branch()
    {
    	return $this->hasMany('App/branch','id_branch','id');
    }
}
