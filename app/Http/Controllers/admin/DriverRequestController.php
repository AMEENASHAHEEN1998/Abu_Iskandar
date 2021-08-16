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
        $Orders=DriverRequest::orderBy('id' , 'desc')->paginate(10);
        $Categories = Category::orderBy('id' , 'desc')->get();
        $Subcategories = SubCategory::orderBy('id' , 'desc')->get();

        // dd($orders);
        return view('admin.driverRequest.index')->with(['Orders' => $Orders,'Categories' => $Categories , 'Subcategories' => $Subcategories ]);
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
            DriverRequest::create([
                'user_id'           => auth()->user()->id,
                'product_id'        => $request->product,
                'category_id'       => $request->category_id,
                'subcategory_id'    => $request->sub_category_id,
                'number'            => $request->number,
                'status'            => 'غير مسلم',
                'status_value'      => 0,

            ]);

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
        try{
            //dd($request->all());

            DriverRequest::findOrFail($id)->update([
                'product_id'        => $request->product,
                'category_id'       => $request->category_id,
                'subcategory_id'    => $request->sub_category_id,
                'number'            => $request->number,
                'status'            => 'غير مسلم',
                'status_value'      => 0,

            ]);

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.driverrequest.index')->with('update' , trans('admin/driverrequest.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driverrequest = DriverRequest::findOrFail($id);
        $driverrequest->delete();
        return redirect()->route('admin.driverrequest.index')->with('delete' ,  trans('admin/driverrequest.delete_message'));

    }


    public function orderwait(){

        $Orders=DriverRequest::where('status_value' ,0)->orderBy('id' , 'desc')->paginate(10);
        $Categories = Category::orderBy('id' , 'desc')->get();
        $Subcategories = SubCategory::orderBy('id' , 'desc')->get();

        return view('admin.driverRequest.orderwait')->with(['Orders' => $Orders,'Categories' => $Categories , 'Subcategories' => $Subcategories ]);
    }
    public function orderdeliver(){

        $Orders=DriverRequest::where('status_value' ,1)->orderBy('id' , 'desc')->paginate(10);
        $Categories = Category::orderBy('id' , 'desc')->get();
        $Subcategories = SubCategory::orderBy('id' , 'desc')->get();

        return view('admin.driverRequest.orderdeliver')->with(['Orders' => $Orders,'Categories' => $Categories , 'Subcategories' => $Subcategories ]);
    }
    public function update_status($id)
    {
        try{
            //dd($request->all());

            DriverRequest::findOrFail($id)->update([
                'status'            => 'تم التسليم',
                'status_value'      => 1,

            ]);

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.orderwait')->with('update_status' , trans('admin/driverrequest.update_status'));

    }
}
