<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::get();
        return view('admin.information.index' , compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information.create');
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
            $company_image_ex = $request->file('image')->getClientOriginalExtension();
            $company_image_name = 'Abu_Iskandar_' .time() . '_'. rand() . '.'. $company_image_ex;

            Information::create([
                'company_name_ar'  => $request->company_name_ar,
                'company_name_en'  => $request->company_name_en,
                'city_ar'          => $request->city_name_ar,
                'city_en'          => $request->city_name_en,
                'address_ar'       => $request->address_ar,
                'address_en'       => $request->address_ar,
                'telephone_number' => $request->telephone_number,
                'phone_number'     => $request->phone_number,
                'email'            => $request->email,
                'facebook_link'    => $request->facebook_link,
                'instagram_link'   => $request->instagram_link,
                'tweeter_link'     => $request->tweeter_link,
                'image'            => $company_image_name,
                'user_id'          => auth()->user()->id,
            ]);

            $request->file('image')->move(public_path('uploads') , $company_image_name);

        }catch (\Exception $e){
            return redirect()->route('admin.information.index')->with('warning',trans('admin/information.error_message'));
        }
        return redirect()->route('admin.information.index')->with('success' , trans('admin/information.success_message'));

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
        $information = Information::findOrFail($id);
        return view('admin.information.edit' , compact('information'));
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
        $information = Information::findOrFail($id);
        $company_image_name = $information->image;
        if ($request->file('image')) {
            $company_image_ex = $request->file('image')->getClientOriginalExtension();
            $company_image_name = 'Abu_Iskandar_' .time() . '_'. rand() . '.'. $company_image_ex;
        }
        $information->update([
            'company_name_ar'  => $request->company_name_ar,
            'company_name_en'  => $request->company_name_en,
            'city_ar'          => $request->city_name_ar,
            'city_en'          => $request->city_name_en,
            'address_ar'       => $request->address_ar,
            'address_en'       => $request->address_ar,
            'telephone_number' => $request->telephone_number,
            'phone_number'     => $request->phone_number,
            'email'            => $request->email,
            'facebook_link'    => $request->facebook_link,
            'instagram_link'   => $request->instagram_link,
            'tweeter_link'     => $request->tweeter_link,
            'image'            => $company_image_name,
        ]);
        $request->file('image')->move(public_path('uploads'), $company_image_name);

        return redirect()->route('admin.information.index')->with('update' , trans('admin/information.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();
        return redirect()->route('admin.information.index')->with('delete' ,  trans('admin/information.delete_message'));

    }
}
