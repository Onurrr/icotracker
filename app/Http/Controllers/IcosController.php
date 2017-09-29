<?php

namespace App\Http\Controllers;

use App\Ico;
use Auth;

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
        $icos = Ico::withCount('likes')->orderBy('likes_count','desc')->where('active', 1)->get();

    	return view('coins.index', compact('icos'));
    }

    public function show(Ico $ico)
    {
 
    	return view('coins.show', compact('ico'));
    }

    public function add()
    {
 
        return view('coins.add');
    }

    public function store()
    {

        $this -> validate(request(), [
            'name' => 'required|unique:icos',
            'website' => 'required|active_url',
            'symbol' => 'required',
            'body' => 'required',
            'start' => 'required|date',
            'total_supply'=> 'required|numeric'
        ]);

        Ico::create([
            'active' => '1',
            'user_id' => Auth::user()->id,
            'name' => request('name'),
            'website' => request('website'),
            'symbol' => request('symbol'),
            'body' => request('body'),
            'start' => request('start'),
            'total_supply' => request('total_supply')

        ]);

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
