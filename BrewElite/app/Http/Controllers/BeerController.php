<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Brewery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Return a JSON respose Containing All The Beer Lables.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function getBeers()
    {
        return Beer::all();
    }

    /**
     * Return a JSON respose Containing All The Beer Lables That Belongs to Provided Brweery id.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function getBeersByBrewery()
    {
        $id = Route::current()->parameter('id');
        return Beer::all()->where('brewery_id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $breweries = Brewery::all();
      return view('beers.create',['breweries' => $breweries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'lable'=>'required',
          'rating'=>'numeric|required|min:1|max:10',
          'brewery_id.exists' => 'Not an existing Brewery'
      ]);

      $brewery = new Beer([
           'lable' => $request->get('lable'),
           'rating' => $request->get('rating'),
           'brewery_id' => $request->get('brewery_id')
       ]);
       $brewery->save();
       return redirect('/beers/create')->with('success', 'Beer Label Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beer = Beer::find($id);
        $beer->delete();
        return redirect('/home')->with('success', 'Beer Label Deleted Successfully !!');
    }
}
