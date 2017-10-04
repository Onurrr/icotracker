<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ico;

class LikesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function store(Ico $ico)
    {
    	$ico->like();

    	flash('You have liked this ico')->success();

    	return back();
    }
}
