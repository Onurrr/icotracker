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

    public function showedit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

        public function update(User $user)
    {
        $this->validate(request(), [
            'role' => 'required|integer|between:0,1',
            'name' => 'required',
            'email' => 'required'
        ]);

         $user->update(request([
            'role',
            'name',
            'email'
     ]));
         flash('The user has been updated')->success();
        return redirect('/admin/index');
    }
}
