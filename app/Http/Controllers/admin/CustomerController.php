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

class CustomerController extends Controller
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
        $Cars = Car::get();
        $Classes = ClassModel::get();
        $Cities = City::get();
        $Users = User::where('roles_name' , 'supervisor')->get();
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


            $customer = Customer::create([
                'first_name' => $request->product_name_ar,
                'middle_name' => $request->product_name_en,
                'last_name'  => $request->product_number,
                'phone_number' => $request->product_name_ar,
                'job_name' => $request->product_name_en,
                'city_id'  => $request->product_number,
                'street_id' => $request->product_name_ar,
                'id_neighborhood' => $request->product_name_en,
                'area'  => $request->product_number,
                'user_id' => $request->product_name_ar,
                'class_id' => $request->product_name_en,
                'financial_dealing'  => $request->product_number,

            ]);

            $list_cars = $request->list_cars;
            foreach($list_cars as $list_car){
                CustomerCar::create([
                    'customer_id' => $customer->id,
                    'user_id' => $list_car['user_id'],
                    'car_id' => $list_car['car_id'],
                    'original_number' => $list_car['original_number'],
                    'note_supervisor' => $list_car['note_supervisor'],

                ]);
            }


        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.customers.index')->with('success' , trans('admin/products.success_message'));

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
        //
    }
}
