<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\DriverRequest;
use App\Exports\DriverRequestExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DriverWaitRequestExport;
use PhpParser\Node\Stmt\ElseIf_;

class DriverRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Orders = DriverRequest::orderBy('id', 'desc')->paginate(5);
        $Categories = Category::orderBy('id', 'desc')->get();
        $Subcategories = SubCategory::orderBy('id', 'desc')->get();

        // dd($orders);
        return view('admin.driverRequest.index')->with(['Orders' => $Orders, 'Categories' => $Categories, 'Subcategories' => $Subcategories]);
    }

    function find(Request $request)
    {

        $search_text = $request->input('query');

        $user = '';
        $product_name = '';
        $Categories = '';
        $Subcategories = '';
        $status_id = [];


        try {
            try {
                $user = User::where('name', 'LIKE', '%' . $search_text . '%')->first()->id;
            } catch (\Throwable $th) {
                $Categories = Category::where('category_name_ar', 'LIKE', '%' . $search_text . '%')->first()->id;
            }

        } catch (\Throwable $th) {

            try {

                try {
                    $Subcategories = SubCategory::where('sub_category_name_ar', 'LIKE', '%' . $search_text . '%')->first()->id;
                } catch (\Throwable $th) {
                    $product_name = Product::
                    where('product_name_ar', 'LIKE', '%' . $search_text . '%')
                    ->orwhere('product_name_ar', 'LIKE', '')
                    ->first()->id;
                }


            } catch (\Throwable $th) {

                try {
                    $status_id = DriverRequest::where('status', 'LIKE', $search_text)->pluck('id')->toarray();
                    // return $status_id;
                } catch (\Throwable $th) {
                    return redirect()->route('admin.driverrequest.index')->with('success', 'غير موجود');
                }

            }
            // $Orders = DriverRequest::with('User', 'Category', 'Product')->all();



        }

        $Orders = DriverRequest::with('User', 'Category', 'Product')
            ->where('user_id', $user)
            ->orWhere('product_id', $product_name)
            ->orWhere('category_id', $Categories)
            ->orWhere('subcategory_id', $Subcategories)
            ->orwhereIn('id', $status_id)
            ->get();

        $Categories = Category::orderBy('id', 'desc')->get();
        $Subcategories = SubCategory::orderBy('id', 'desc')->get();
        return view('admin.driverRequest.find', compact('Orders', 'Categories', 'Subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::orderBy('id', 'desc')->get();
        $Subcategories = SubCategory::orderBy('id', 'desc')->get();

        return view('admin.driverRequest.create')->with(['Categories' => $Categories, 'Subcategories' => $Subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.driverrequest.index')->with('success', trans('admin/driverrequest.success_message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DriverRequest::find($id);
        return view('admin.driverRequest.show', compact('order'));
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
        try {
            //dd($request->all());

            DriverRequest::findOrFail($id)->update([
                'product_id'        => $request->product,
                'category_id'       => $request->category_id,
                'subcategory_id'    => $request->sub_category_id,
                'number'            => $request->number,
                'status'            => 'غير مسلم',
                'status_value'      => 0,

            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.driverrequest.index')->with('update', trans('admin/driverrequest.update_message'));
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
        return redirect()->route('admin.driverrequest.index')->with('delete',  trans('admin/driverrequest.delete_message'));
    }


    public function orderwait()
    {

        $Orders = DriverRequest::where('status_value', 0)->orderBy('id', 'desc')->paginate(10);
        $Categories = Category::orderBy('id', 'desc')->get();
        $Subcategories = SubCategory::orderBy('id', 'desc')->get();

        return view('admin.driverRequest.orderwait')->with(['Orders' => $Orders, 'Categories' => $Categories, 'Subcategories' => $Subcategories]);
    }
    public function orderdeliver()
    {

        $Orders = DriverRequest::where('status_value', 1)->orderBy('id', 'desc')->paginate(10);
        $Categories = Category::orderBy('id', 'desc')->get();
        $Subcategories = SubCategory::orderBy('id', 'desc')->get();

        return view('admin.driverRequest.orderdeliver')->with(['Orders' => $Orders, 'Categories' => $Categories, 'Subcategories' => $Subcategories]);
    }

    public function update_status($id)
    {
        try {
            //dd($request->all());

            DriverRequest::findOrFail($id)->update([
                'status'            => 'تم التسليم',
                'status_value'      => 1,

            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.orderwait')->with('update_status', trans('admin/driverrequest.update_status'));
    }

    public function export()
    {
        return Excel::download(new DriverRequestExport, 'driver_request.xlsx');
    }

    public function export_wait_request()
    {
        return Excel::download(new DriverWaitRequestExport, 'driver_wait_request.xlsx');
    }
}
