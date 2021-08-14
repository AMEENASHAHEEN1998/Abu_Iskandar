<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DistributorType;
use Illuminate\Http\Request;

class DistributorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributortypes=DistributorType::paginate(5);
        return view('admin.distributortype.index',compact('distributortypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name_ar' =>'required',
            'name_en' =>'required',
        ]);

        DistributorType::create([
            'name_ar' =>$request->name_ar,
            'name_en' =>$request->name_en,
            'user_id' =>$request->user_id,
            'created_at' =>now()

        ]);

        return redirect()->route('admin.distributortype.index')->with('success' , trans('admin/distributortype.success_message'));
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
        $request->validate([
            'name_ar' =>'required',
            'name_en' =>'required',
        ]);

        DistributorType::find($id)->update([
            'name_ar' =>$request->name_ar,
            'name_en' =>$request->name_en,
            'updated_at' =>now()

        ]);

        return redirect()->route('admin.distributortype.index')->with('success' , trans('admin/distributortype.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DistributorType::find($id)->delete();
        return redirect()->route('admin.distributortype.index')->with('success' , trans('admin/distributortype.delete_message'));

    }
}
