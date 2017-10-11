<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {
    	$icos = $category->icos;
		$categories = Category::all();
    	return view('coins.index', compact('icos','categories'));

    }
}
