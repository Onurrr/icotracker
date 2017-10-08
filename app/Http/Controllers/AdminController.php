<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('admin.index', compact('users'));    
    }
}
