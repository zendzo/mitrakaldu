<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequirementDocument extends Model
{
    protected $fillable = [
    	'user_id',
		'document_type_id',
		'approved',
		'location',
		'keterangan'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function documentType()
    {
    	return $this->belongsTo('App\DocumentType','document_type_id');
    }
}
