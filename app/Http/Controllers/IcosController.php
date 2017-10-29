<?php

namespace App\Http\Controllers;

use App\Ico;
use Auth;
use DB;
use App\Category;
use Request;

class IcosController extends Controller
{
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {

        $sq = Request::get('search');

 
        $icos = Ico::where('name','like','%'.$sq.'%')->orWhere('body','like','%'.$sq.'%')->withCount('likes')->orderBy('likes_count','desc')->where('active', 1)->get();

        
        $categories = Category::all();

    	return view('coins.index', compact('icos','categories'));
    }

    public function show(Ico $ico)
    {
        if( $ico -> active == "0"){
            return redirect('/coins/');
      }else{
        return view('coins.show', compact('ico'));  
      }
    }

    public function showedit(Ico $ico)
    {
        $this->authorize('update', $ico);
        return view('coins.edit', compact('ico'));
    }


    public function update(Ico $ico)
    {
        $this->authorize('update', $ico);
        $this -> validate(request(), [
            'website' => 'required',
            'symbol' => 'required',
            'body' => 'required',
            'start' => 'required|date',
            'total_supply'=> 'required|numeric|max:9223372036854775807'
        ]);

         $ico->update(request([
            'website',
            'symbol',
            'body',
            'start',
            'total_supply'
     ]));

         flash('The Ico has been updated')->success();
        return redirect('/coins/');
    }

    public function add(Category $category)
    {
        $categories = Category::all();

        return view('coins.add', compact('categories'));
    }

    public function disable(Ico $ico)
    {
        
   $this->authorize('update', $ico);
   $ico->update(['active' => 0]);
flash('The Ico has been disabled.')->success();
        return back();
    }

    public function enable(Ico $ico)
    {
        
   $this->authorize('update', $ico);
   $ico->update(['active' => 1]);
flash('The Ico has been enabled.')->success();
        return back();
    }


    public function store(Ico $ico)
    {
           $this->authorize('create', $ico);

        $this -> validate(request(), [
            'name' => 'required|unique:icos',
            'website' => 'required',
            'symbol' => 'required',
            'body' => 'required',
            'start' => 'required|date',
            'total_supply'=> 'required|numeric',
            'categoryradio' => 'required'
        ]);

        $createico = Ico::create([
            'active' => '1',
            'user_id' => Auth::user()->id,
            'name' => request('name'),
            'website' => request('website'),
            'symbol' => request('symbol'),
            'body' => request('body'),
            'start' => request('start'),
            'total_supply' => request('total_supply')
        ]);

   DB::table('category_ico')->insert([
    ['category_id' => request('categoryradio'),'ico_id' => $createico->id]
]);
flash('The Ico has been created')->success();
        return redirect('/coins');
    }

    public function destroy(Ico $ico)
    {
        $this->authorize('update', $ico);
        $ico->comments()->delete();
        $ico->delete();

        return redirect('/coins');
    }
}
