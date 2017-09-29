<?php

namespace App\Http\Controllers;

use App\Ico;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Ico $ico){
    	$this -> validate(request(), ['body' => 'required|min:10']);
    	$ico->addComment(request('body'));

    	return back();
    }
}
