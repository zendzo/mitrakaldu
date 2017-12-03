<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{

	protected $fillable = [
		'rumah_type_id',
		'block',
		'no',
		'subsidi',
		'harga',
		'deposit',
		'angsuran',
		'booked_by',
		'upload',
	];

	public function getDepositAttribute($value)
	{
		return $this->harga * 0.1;
	}

	public function getAngsuranAttribute($value)
	{
		return $this->harga * 0.1 / 10;
	}

    public function type()
    {
    	return $this->belongsTo('App\RumahType','rumah_type_id');
    }

    public function bookedBy()
    {
    	return $this->belongsTo('App\User','booked_by');
    }
}
