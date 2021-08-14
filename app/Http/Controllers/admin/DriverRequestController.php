<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DriverRequest;
use Illuminate\Http\Request;

class DriverRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=DriverRequest::all();
        // dd($orders);
        return view('admin.driverRequest.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.driverRequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('status') == 1) {
            $request->status = 1;
        } else {
            $request->status = 0;
        }

        // return   $request;
        DriverRequest::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'size' => $request->size,
            'number' => $request->number,
            'status' => 'غير مفعل',
            'status_value' => 1,

        ]);
        return redirect()->route('admin.driverrequest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order =DriverRequest::find($id);
        return view('admin.driverRequest.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order =DriverRequest::find($id);
        return view('admin.driverRequest.edit',compact('order'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DriverRequest::find($id)->delete();
        return redirect()->back();
    }


    public function orderwait(){

        $orders=DriverRequest::where('status_value' ,0)->paginate(5);
        return view('admin.driverRequest.orderwait',compact('orders'));
    }
    public function orderdeliver(){

        $orders=DriverRequest::where('status_value' ,1)->paginate(5);
        return view('admin.driverRequest.orderdeliver',compact('orders'));
    }
}
