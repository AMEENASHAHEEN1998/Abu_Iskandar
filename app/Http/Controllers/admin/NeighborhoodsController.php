<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NeighborhoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neighborhoods=Neighborhood::orderBy('id' , 'desc')->paginate(5);
        $cities=City::all();
        return view('admin.neighborhood.index',compact('neighborhoods','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        Neighborhood::create([
            'name'=>$request->name,
            'city_id' =>  $request->city
        ]);
        return redirect()->route('admin.neighborhood.index')->with('success',trans('admin/neighborhood.success_message'));

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
        Neighborhood::find($id)->delete();
        return redirect()->route('admin.neighborhood.index')->with('success',trans('admin/neighborhood.delete_message'));

    }
}
