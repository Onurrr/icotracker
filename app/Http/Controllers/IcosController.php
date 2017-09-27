<?php

namespace App\Http\Controllers;

use App\Ico;

class IcosController extends Controller
{
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$icos = Ico::all();


    	return view('coins.index', compact('icos'));
    }

    public function show(Ico $ico)
    {
 
    	return view('coins.show', compact('ico'));
    }
}
