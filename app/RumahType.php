<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumahType extends Model
{
	public function unit()
	{
		return $this->hasOme('App\Rumah');
	}
}
