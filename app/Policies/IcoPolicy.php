<?php

namespace App\Policies;

use App\User;
use App\Ico;
use Illuminate\Auth\Access\HandlesAuthorization;
use DB;
use Auth;

class IcoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ico.
     *
     * @param  \App\User  $user
     * @param  \App\Ico  $ico
     * @return mixed
     */
    public function view(User $user, Ico $ico)
    {
        //
    }

    /**
     * Determine whether the user can create icos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Ico $ico)
    {
        $likecount = DB::table('likes')->where('user_id',Auth::user()->id)->count();

        if($likecount >= 5){
            return true;
        }
    }

    /**
     * Determine whether the user can update the ico.
     *
     * @param  \App\User  $user
     * @param  \App\Ico  $ico
     * @return mixed
     */
    public function update(User $user, Ico $ico)
    {
        return $ico->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the ico.
     *
     * @param  \App\User  $user
     * @param  \App\Ico  $ico
     * @return mixed
     */
    public function delete(User $user, Ico $ico)
    {
        //
    }
}
