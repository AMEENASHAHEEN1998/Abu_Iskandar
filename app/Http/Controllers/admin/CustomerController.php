<?php

namespace App\Http\Controllers\admin;

use App\Models\Car;
use App\Models\City;
use App\Models\User;
use App\Models\Street;
use App\Models\Customer;
use App\Models\ClassModel;
use App\Models\CustomerCar;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Auth::user()->roles_name;
        $Cars = Car::orderBy('id', 'desc')->get();
        $Classes = ClassModel::orderBy('id', 'desc')->get();
        $Cities = City::orderBy('id', 'desc')->get();
        $Users = User::where('roles_name', 'مشرف')->orderBy('id', 'desc')->get();
        $Neighborhood = Neighborhood::orderBy('id', 'desc')->get();
        $Streets = Street::orderBy('id', 'desc')->get();
        $CustomerCars = CustomerCar::get();
        $Customer = Customer::get();
        return view('admin.customer.index')->with([
            'CustomerCars' => $CustomerCars,
            'Cars' => $Cars, 'Classes' => $Classes,
            'Cities' => $Cities, 'Users' => $Users,
            'Neighborhood' => $Neighborhood, 'Streets' => $Streets,
            'Customer' => $Customer
        ]);
    }

    function findCustomer(Request $request)
    {
        $search_text = $request->input('query');

        $id = '';
        $name = '';
        $userid = '';
        $cuctomer = [];

        try {

            $userid = User::where('name', 'LIKE', '%' . $search_text . '%')->first()->id;
            // return $userid;

        } catch (\Throwable $th) {
            $cuctomer = Customer::where('first_name', 'LIKE', '%' . $search_text . '%')
                ->orWhere('middle_name', 'LIKE', '%' . $search_text . '%')
                ->orWhere('last_name', 'LIKE', '%' . $search_text . '%')
                ->orWhere('phone_number', 'LIKE',  $search_text)
                // ->first()->id;
                ->pluck('id')->toarray();
        }


        $CustomersCar = CustomerCar::with('User', 'Customer')
            ->where('id', $id)
            ->orwhereIn('customer_id', $cuctomer)
            ->orwhere('user_id', $userid)
            ->orwhere('original_number', $search_text)
            ->get();

        $Cars = Car::orderBy('id', 'desc')->get();
        $Classes = ClassModel::orderBy('id', 'desc')->get();
        $Cities = City::orderBy('id', 'desc')->get();
        $Users = User::where('roles_name', 'supervisor')->orderBy('id', 'desc')->get();
        $Neighborhood = Neighborhood::orderBy('id', 'desc')->get();
        $Streets = Street::orderBy('id', 'desc')->get();
        // $CustomersCar = CustomerCar::with('User', 'Customer')->find(2);
        // return $CustomersCar;

        return view('admin.customer.index')->with([
            'CustomerCars' => $CustomersCar,
            'Cars' => $Cars, 'Classes' => $Classes,
            'Cities' => $Cities, 'Users' => $Users,
            'Neighborhood' => $Neighborhood, 'Streets' => $Streets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $Cars = Car::orderBy('id', 'desc')->get();
            $Classes = ClassModel::orderBy('id', 'desc')->get();
            $Cities = City::orderBy('id', 'desc')->get();
            $Users = User::where('roles_name', 'مشرف')->orderBy('id', 'desc')->get();
            // dd($Users);
            return view('admin.customer.create')->with(['Cars' => $Cars, 'Classes' => $Classes, 'Cities' => $Cities, 'Users' => $Users]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.job.index')->with('warning', trans('admin/job.error_message'));
        }
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
            // dd($request->all());
            // $validated = $request->validate([
            //     'phone_number' => 'required|max:10',
            // ]);
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
            foreach ($list_cars as $list_car) {
                CustomerCar::create([
                    'customer_id' => $customer->id,
                    'user_id' => $list_car['name'],
                    'car_id' => $list_car['car_id'],
                    'original_number' => $list_car['original_number'],
                    'note_supervisor' => $list_car['note_supervisor'],

                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.customers.index')->with('success', 'تم اضافة الزبون بنجاح');
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
        return view('admin.customer.show')->with([
            'CustomerCar' => $CustomerCar, 'Streets' => $Streets,
            'Neighborhoods' => $Neighborhoods, 'Cities' => $Cities, 'Classes' => $Classes
        ]);
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
            // dd($request->all());
            $customer = Customer::findOrFail($id);
            $customer->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name'  => $request->last_name,
                'phone_number' => $request->phone_number,
                'job_name' => $request->job_name,
                'city_id'  => $request->city_id,
                'street_id' => ($request->street_id == null ? $customer->street_id : $request->street_id),
                'id_neighborhood' => ($request->id_neighborhood == null ? $customer->id_neighborhood : $request->id_neighborhood),
                'area'  => $request->area,
                'user_id' => auth()->user()->id,
                'class_id' => $request->class_id,
                'financial_dealing'  => $request->financial_dealing,
            ]);


            $customer_car = CustomerCar::where('customer_id', $customer->id);
            $customer_car->update([
                'user_id' => $request->name,
                'car_id' => $request->car_id,
                'original_number' => $request->original_number,
                'note_supervisor' => $request->note_supervisor,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.customers.index')->with('success', 'تم تعديل الزبون بنجاح');
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
        return redirect()->route('admin.customers.index')->with('success',  'تم حذف حرف السيارة لهذا الزبون بنجاح');
    }
}
