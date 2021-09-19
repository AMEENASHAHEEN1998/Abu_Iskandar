<?php

namespace App\Http\Controllers\admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerCar;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customers = Customer::where('status_value' , 0)->get();
        $Users = User::get();
        $Cars = Car::get();
        return view('admin.note.index')->with(['Customers' => $Customers , 'Users' => $Users , 'Cars' => $Cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('errors.404');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('errors.404');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('errors.404');

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
        return view('errors.404');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('errors.404');

    }

    public function sendtoaddnote($id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->update([
            'status' => 'اضافة ملاحظة' ,
            'status_value' => 1,
        ]);

        Note::create([
            'note_employee' =>'',
            'customer_id' =>$id,
            'user_id' => auth()->user()->id,
            'status' => 'اضافة ملاحظة' ,
            'status_value' => 1,
        ]);

        return redirect()->route('admin.addnoteview');
    }

    public function addnoteview()
    {

        $Customers = Customer::where('status_value' , 1)->get();
        $Note = Note::where('status_value' , 1)->get();
        $Users = User::get();
        $Cars = Car::get();
        return view('admin.note.addnoteview')->with(['Customers' => $Customers ,'Note' => $Note, 'Users' => $Users , 'Cars' => $Cars]);

    }

    public function updatenote(Request $request,$id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->update([
            'status' => 'تم اضافة ملاحظة' ,
            'status_value' => 2,
        ]);
        $Customer->Note->update([
            'note_employee' =>$request->note_employee,
            'customer_id' =>$id,
            'user_id' => auth()->user()->id,
            'status' => 'تم اضافة ملاحظة' ,
            'status_value' => 2,
        ]);
        return redirect()->route('admin.addnoteview');

    }

    public function show_notes(){

        $Customers = Customer::where('status_value' , 2)->get();
        $Note = Note::where('status_value' , 1)->get();
        $Users = User::get();
        $Cars = Car::get();
        return view('admin.note.show_notes')->with(['Customers' => $Customers ,'Note' => $Note, 'Users' => $Users , 'Cars' => $Cars]);

    }
}
