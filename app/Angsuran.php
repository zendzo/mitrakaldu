<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Angsuran extends Model
{
	protected $fillable = [
		'user_id',
		'rumah_id',
		'kode',
		'jumlah',
		'tanggal_bayar',
		'tanggal_tempo',
		'location',
	];

	protected $dates = ['tanggal_bayar','tanggal_tempo'];

	public function rumah()
	{
		return $this->belongsTo('App\Rumah');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function setTanggalBayarAttribute($value)
	{
		$this->attributes['tanggal_bayar'] = Carbon::createFromFormat('d-m-Y',$value)->toDateString();
	}
}
