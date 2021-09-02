<?php

namespace App\Http\Controllers\admin;

use App\Models\Car;
use App\Models\City;
use App\Models\User;
use App\Models\Customer;
use App\Models\ClassModel;
use App\Models\CustomerCar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use App\Models\Street;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cars = Car::orderBy('id' , 'desc')->get();
        $Classes = ClassModel::orderBy('id' , 'desc')->get();
        $Cities = City::orderBy('id' , 'desc')->get();
        $Users = User::where('roles_name' , 'supervisor')->orderBy('id' , 'desc')->get();
        $Neighborhood = Neighborhood::orderBy('id' , 'desc')->get();
        $Streets = Street::orderBy('id' , 'desc')->get();
        $CustomerCars = CustomerCar::get();
        return view('admin.customer.index')->with(['CustomerCars' => $CustomerCars ,
        'Cars' => $Cars , 'Classes' => $Classes ,
        'Cities' => $Cities , 'Users' => $Users ,
        'Neighborhood' =>$Neighborhood , 'Streets' => $Streets]);
    }

    function find(Request $request)
    {
  
        $search_text = $request->input('query');

        $user = '';
        $first_name = '';
        $middle_name = '';
        $last_name = '';
        $phone_number = '';
        $job_name = '';



        try {
        //     try {
            $user = User::where('name', 'LIKE', '%' . $search_text . '%')->first()->id;
        //     } catch (\Throwable $th) {
        //         $Categories = Category::where('category_name_ar', 'LIKE', '%' . $search_text . '%')->first()->id;
            

        } catch (\Throwable $th) {
        //     try {
        //         $Subcategories = SubCategory::where('sub_category_name_ar', 'LIKE', '%' . $search_text . '%')->first()->id;
        //     } catch (\Throwable $th) {
        //         $product_name = Product::where('product_name_ar', 'LIKE', '%' . $search_text . '%')->first()->id;
        //     }

        }

        // $Customer = Customer::with('User', 'CustomerCar')
        //     ->where('first_name', $first_name)
        //     ->orWhere('middle_name', $middle_name)
        //     ->orWhere('last_name', $last_name)
        //     ->orWhere('phone_number', $phone_number)
        //     ->orWhere('job_name', $job_name)
        //     ->orWhere('user_id', $user)
      
        //     ->get();
        $Customers = Customer::all();
        $Cars = Car::orderBy('id' , 'desc')->get();
        $Classes = ClassModel::orderBy('id' , 'desc')->get();
        $Cities = City::orderBy('id' , 'desc')->get();
        $Users = User::where('roles_name' , 'supervisor')->orderBy('id' , 'desc')->get();
        $Neighborhood = Neighborhood::orderBy('id' , 'desc')->get();
        $Streets = Street::orderBy('id' , 'desc')->get();
        $CustomerCars = CustomerCar::get();

        return view('admin.customer.index')->with(['Customers' => $Customers ,
        'CustomerCars' => $CustomerCars ,
        'Cars' => $Cars , 'Classes' => $Classes ,
        'Cities' => $Cities , 'Users' => $Users ,
        'Neighborhood' =>$Neighborhood , 'Streets' => $Streets]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Cars = Car::orderBy('id' , 'desc')->get();
        $Classes = ClassModel::orderBy('id' , 'desc')->get();
        $Cities = City::orderBy('id' , 'desc')->get();
        $Users = User::where('roles_name' , 'مشرف')->orderBy('id' , 'desc')->get();
        // dd($Users);
        return view('admin.customer.create')->with(['Cars' => $Cars , 'Classes' => $Classes , 'Cities' => $Cities , 'Users' => $Users]);
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
     // dd($request->all());
            $customer = Customer::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name'  => $request->last_name,
                'phone_number' => $request->phone_number,
                'job_name' => $request->job_name,
                'city_id'  => $request->city_id,
                'street_id' => $request->street_id,
                'id_neighborhood' => $request->id_neighborhood,
                'area'  => $request->area,
                'user_id' => auth()->user()->id,
                'class_id' => $request->class_id,
                'financial_dealing'  => $request->financial_dealing,
                'status' => 'تحت الانتظار',
                'status_value' => 0,

            ]);

            $list_cars = $request->list_cars;
            foreach($list_cars as $list_car){
                CustomerCar::create([
                    'customer_id' => $customer->id,
                    'user_id' => $list_car['name'],
                    'car_id' => $list_car['car_id'],
                    'original_number' => $list_car['original_number'],
                    'note_supervisor' => $list_car['note_supervisor'],

                ]);
            }


        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.customers.index')->with('success' , 'تم اضافة الزبون بنجاح');


       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CustomerCar = CustomerCar::findOrFail($id);
        $Streets = Street::get();
        $Neighborhoods = Neighborhood::get();
        $Cities = City::get();
        $Classes = ClassModel::get();
        return view('admin.customer.show')->with(['CustomerCar' => $CustomerCar , 'Streets' => $Streets ,
         'Neighborhoods' => $Neighborhoods , 'Cities' => $Cities , 'Classes' => $Classes ]);
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
        try{
            // dd($request->all());
            $customer = Customer::findOrFail($id);
            $customer->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name'  => $request->last_name,
                'phone_number' => $request->phone_number,
                'job_name' => $request->job_name,
                'city_id'  => $request->city_id,
                'street_id' => ($request->street_id == null?$customer->street_id :$request->street_id) ,
                'id_neighborhood' => ($request->id_neighborhood == null?$customer->id_neighborhood :$request->id_neighborhood),
                'area'  => $request->area,
                'user_id' => auth()->user()->id,
                'class_id' => $request->class_id,
                'financial_dealing'  => $request->financial_dealing,
            ]);


            $customer_car = CustomerCar::where('customer_id' , $customer->id);
            $customer_car->update([
                'user_id' => $request->name,
                'car_id' => $request->car_id,
                'original_number' => $request->original_number,
                'note_supervisor' => $request->note_supervisor,
            ]);

            }catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
            return redirect()->route('admin.customers.index')->with('success' , 'تم تعديل الزبون بنجاح');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CustomerCar = CustomerCar::findOrFail($id);
        $CustomerCar->delete();
        return redirect()->route('admin.customers.index')->with('delete' ,  'تم حذف حرف السيارة لهذا الزبون بنجاح');

    }
}
