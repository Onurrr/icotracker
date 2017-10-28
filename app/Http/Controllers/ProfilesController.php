<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
    	$likes = Like::all()->where('user_id',$user->id);
    	return view('profiles.show', compact('user','likes'));

    }
}
