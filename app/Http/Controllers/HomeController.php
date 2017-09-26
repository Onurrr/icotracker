<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ico;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icos = Ico::all();
        return view('home',compact('icos'));
    }
}
