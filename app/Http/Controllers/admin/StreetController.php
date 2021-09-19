<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Street;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streets=Street::orderBy('id' , 'desc')->paginate(5);
        $neighborhoods=Neighborhood::all();

        return view('admin.street.index',compact('streets','neighborhoods'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('errors.404');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Street::create([
            'name'=>$request->name,
            'id_neighborhood' =>  $request->neighborhood
        ]);
        return redirect()->route('admin.street.index')->with('success',trans('admin/street.success_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('errors.404');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('errors.404');

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
        Street::find($id)->update([
            'name'=>$request->name,
            'id_neighborhood' =>  $request->neighborhood
        ]);
        return redirect()->route('admin.street.index')->with('success',trans('admin/street.update_message'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Street::find($id)->delete();
        return redirect()->route('admin.street.index')->with('success',trans('admin/street.delete_message'));

    }

    public function get_street($id)
    {
        $streets = DB::table('streets')->where('id_neighborhood' , $id)->pluck('name' , 'id');

        return json_encode($streets);
    }
}
