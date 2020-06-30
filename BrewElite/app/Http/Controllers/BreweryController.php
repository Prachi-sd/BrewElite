<?php

namespace App\Http\Controllers;

use App\Brewery;

use Illuminate\Http\Request;

class BreweryController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('breweries.create');
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
          'name'=>'required',
          'city'=>'required'
      ]);

      $brewery = new Brewery([
           'name' => $request->get('name'),
           'city' => $request->get('city')
       ]);
       $brewery->save();
       return redirect('/breweries/create')->with('success', 'Brewery Created Successfully !!');
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
      $brewery = Brewery::find($id);
      return view('breweries.edit', compact('brewery'));
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
      $request->validate([
           'name'=>'required',
           'city'=>'required'
       ]);

       $brewery = Brewery::find($id);
       $brewery->name =  $request->get('name');
       $brewery->city  = $request->get('city');
       $brewery->save();

        return redirect('/home')->with('success', 'Brewery Updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $brewery = Brewery::find($id);
      $brewery->beers()->delete();
      $brewery->delete();
      return redirect('/home')->with('success', 'Brewery An All The Label It Owned Deleted Successfully !!');
    }
}
