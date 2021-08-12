<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistributorRequest;
use App\Models\Distributor;
use App\Models\DistributorType;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $distributors= Distributor::all();
    //    dd($distributors);
    // $distributor_types=DistributorType::all();
       return view('admin.distributor.index',compact('distributors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distributor_types=DistributorType::all();
        return view('admin.distributor.create',compact('distributor_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistributorRequest $request)
    {
        // return $request;
        Distributor::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'distributor_name_ar' => $request->distributor_name_ar,
            'distributor_name_en' => $request->distributor_name_en,
            'distributor_type_id' => $request->distributor_type_id,
            'phone_number' => $request->phone_number,
            'user_id' => $request->user_id,

        ]);

        return redirect()->route('admin.distributor.index')->with('success' , trans('admin/distributor.success_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distributor=Distributor::find($id);

        return view('admin.distributor.show',compact('distributor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor=Distributor::find($id);
        $distributor_types=DistributorType::all();
        return view('admin.distributor.edit',compact('distributor',$distributor,'distributor_types',$distributor_types));
    }


    public function update(DistributorRequest $request, $id)
    {
        Distributor::find($id)->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'distributor_name_ar' => $request->distributor_name_ar,
            'distributor_name_en' => $request->distributor_name_en,
            'distributor_type_id' => $request->distributor_type_id,
            'phone_number' => $request->phone_number,
            'user_id' => $request->user_id,
            'updated_at' => now(),

        ]);

        return redirect()->route('admin.distributor.index')->with('success' , trans('admin/distributor.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor=Distributor::find($id)->delete();
        return redirect()->route('admin.distributor.index')->with('success' , trans('admin/distributor.update_message'));


    }
}
