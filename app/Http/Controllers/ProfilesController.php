<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;
use Auth;

class ProfilesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
    	$likes = Like::all()->where('user_id',$user->id);
    	$authuser = Auth::user();
    	return view('profiles.show', compact('user','likes','authuser'));

    }
       public function showedit(User $user)
    {

        if( $user->id == Auth::user()->id){
            return view('profiles.edit', compact('user'));
      }else{
        return view('coins.show', compact('ico'));  
      }
    }

        public function update(User $user)
    {
        if( $user->id == Auth::user()->id){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required'
        ]);

         $user->update(request([
            'name',
            'email'
     ]));
         flash('Your profile has been updated')->success();
        return redirect('/coins/');
    }else{
        return view('coins.show', compact('ico'));
    }
    }
}
