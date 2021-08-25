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
        $Users = User::where('roles_name' , 'supervisor')->orderBy('id' , 'desc')->get();
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
