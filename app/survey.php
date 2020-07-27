<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $table = 'survey';
    public function theme()
    {
    	return $this->hasMany('App/theme','id_theme','id');
    }
}
