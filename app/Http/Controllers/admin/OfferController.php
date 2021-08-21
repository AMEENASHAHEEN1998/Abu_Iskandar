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
        $offers = Offer::orderBy('id','desc')->paginate(5);
        // dd($offers);
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
        $image_name ='' ;

        if ($request->has('image')) {
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $image_name=time().'_'.rand().'.'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/offer'),$image_name);
        }

        // return   $file_name;
        Offer::create([
            'user_id' => $request->user_id,
            'offer_title_en' => $request->offer_title_en,
            'description_en' => $request->description_en,
            'offer_title_ar' => $request->offer_title_ar,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'views' => 0,
            'status' => 'مفعل',
            'status_value' => 1,
            'image' => $image_name,

        ]);
        return redirect()->route('admin.offer.index')->with('success' , trans('admin/offer.success_message'));
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
        // return $request;
        if ($request->has('status') == 1) {
            $request->status_value = 1;
            $status = 'مفعل';
        } else {
            $request->status_value = 0;
            $status = 'غير مفعل ';

        }

        $offer = Offer::findOrFail($id);
        $image_name = $offer->image;
        // return $image_name;

        if ($request->has('image')) {
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $image_name=time().'_'.rand().'.'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/offer'),$image_name);
        }

        // return $image_name;
        // return   $request;
        Offer::find($id)->update([
            'user_id' => $request->user_id,
            'offer_title_ar' => $request->offer_title_ar,
            'offer_title_en' => $request->offer_title_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'price' => $request->price,
            'image' => $image_name,
            'status' => $status,
            'status_value' => $request->status_value,

        ]);
        return redirect()->route('admin.offer.index')->with('success' , trans('admin/offer.update_message'));
    }
    public function destroy($id)
    {

        Offer::find($id)->delete();
        return redirect()->route('admin.offer.index')->with('success' , trans('admin/offer.delete_message'));
    }

    public function activeoffer(){
        $offers=Offer::where('status_value' ,1)->orderBy('id','desc')->paginate(5);
        return view('admin.offer.active',compact('offers'));
    }
    public function noactiveoffer(){
        $offers=Offer::where('status_value' ,0)->orderBy('id','desc')->paginate(5);
        return view('admin.offer.noactive',compact('offers'));
    }
}
