<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        // dd($offers->User);
        return view('admin.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('admin.offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {

        // if ($request->has('status') == 1) {
        //     $request->status = 1;
        // } else {
        //     $request->status = 0;
        // }
        // return $request;

        $file=$request->file;

        $FileEx=$request->file('image')->getClientOriginalExtension();
        $file_name=time().'_'.rand().'_'.$FileEx;
        $request->file('image')->move(public_path('upload/admin/offer'),$file_name);

        // return   $file_name;
        Offer::create([
            'user_id' => $request->user_id,
            'offer_title' => $request->offer_title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => 1,
            'image' => $file_name,

        ]);
        return redirect()->route('admin.offer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer =Offer::find($id);
        return view('admin.offer.show',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $offer =Offer::find($id);
        // return $offer;
        return view('admin.offer.edit',compact('offer'));
    }


    public function update(OfferRequest $request, $id)
    {
        if ($request->has('status') == 1) {
            $request->status = 1;
        } else {
            $request->status = 0;
        }

        // return   $request;
        Offer::find($id)->update([
            'user_id' => $request->user_id,
            'offer_title' => $request->offer_title,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,

        ]);
        return redirect()->route('admin.offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Offer::find($id)->delete();
        return redirect()->back();
    }

    public function activeoffer(){
        $offers=Offer::where('status' ,1)->get();
        return view('admin.offer.active',compact('offers'));
    }
    public function noactiveoffer(){
        $offers=Offer::where('status' ,0)->get();
        return view('admin.offer.noactive',compact('offers'));
    }
}
