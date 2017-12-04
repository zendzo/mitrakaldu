<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
	public function rumah()
	{
		return $this->belongsTo('App\Rumah');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
