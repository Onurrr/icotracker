<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	public function liked(){
		return $this->morphTo();
	}
    //To counter MassAssignmentException
    protected $guarded = [];
}
