<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Ico extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
 public function addComment($body)
    {
    	Comment::create([
    	'body' => $body,
    	'ico_id' => $this->id,
    	'user_id' => Auth::user()->id
    	]);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function likes()
    {
    	return $this->morphMany(Like::class, 'liked');
    }

    public function like()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->likes()->where($attributes)->exists()) {
            return $this->likes()->create($attributes);
        }
    }

    public function isliked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    //To counter MassAssignmentException
    protected $guarded = [];
    
}
