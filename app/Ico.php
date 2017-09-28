<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ico extends Model
{
    //To counter MassAssignmentException
    protected $guarded = [];
}
