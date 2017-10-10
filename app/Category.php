<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function icos()
    {
    	return $this->belongsToMany(Ico::class);
    }
    //To counter MassAssignmentException
    protected $guarded = [];
}
