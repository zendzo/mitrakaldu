<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public function requirementDocument()
    {
    	return $this->hasOne('App\RequirementDocument');
    }
}
