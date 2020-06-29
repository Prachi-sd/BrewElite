<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Brewery;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $breweries = Brewery::all();
        $beers     = Beer::whereNotNull('lable')->with('brewery')->get();
    
        return view('dashboard',['breweries' => $breweries,'beers'=>$beers]);
    }
}
