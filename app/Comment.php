<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public function ico()
    {
    	return $this->belongsTo(Ico::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    //To counter MassAssignmentException
    protected $guarded = [];
}
