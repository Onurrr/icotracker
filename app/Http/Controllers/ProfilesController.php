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
       public function showedit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

        public function update(User $user)
    {
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
    }
}
