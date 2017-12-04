<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{

	protected $fillable = ['nama','alamat'];
	
    public function rumah()
    {
    	return $this->hasMany('App\Rumah');
    }
}
