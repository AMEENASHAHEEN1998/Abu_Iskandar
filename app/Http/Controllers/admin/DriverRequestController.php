<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\DriverRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;

class DriverRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Orders=DriverRequest::all();
        // dd($orders);
        return view('admin.driverRequest.index',compact('Orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::orderBy('id' , 'desc')->get();
        $Subcategories = SubCategory::orderBy('id' , 'desc')->get();

        return view('admin.driverRequest.create')->with(['Categories' => $Categories , 'Subcategories' => $Subcategories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //dd($request->all());
            $driver_requests = $request->driver_requests;
            foreach($driver_requests as $driver_request){
                $new_driver_request = DriverRequest::create([
                    'user_id' => auth()->user()->id,
                    'product_id'        => $driver_request['product'],
                    'category_id'       => $driver_request['category_id'],
                    'subcategory_id'    => $driver_request['subcategory_id'],
                    'number'            => $driver_request['number'],
                    'status'            => 'غير مسلم',
                    'status_value'      => 0,
                ]);
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.driverrequest.index')->with('success' , trans('admin/driverrequest.success_message'));

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
