<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Category;

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
        $attr = ['user_id' => auth()->id()];
        if (! $this->likes()->where($attr)->exists()) {
            return $this->likes()->create($attr);
        }
    }

    public function isliked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function isdisabled()
    {
        return $this->where('active', 0);
    }

    //To counter MassAssignmentException
    protected $guarded = [];
    
}
