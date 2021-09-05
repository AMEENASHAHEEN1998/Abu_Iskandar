@extends('front.layout.layout')
@section('content')
        <!-- Carousel
    ================================================== -->
    @foreach ( $CategoryImage as $CategoryImage )

    <img id="first-slide" class="first-slide" src="{{asset('uploads/'.$CategoryImage->image)}}" alt="First slide"></a>
    @endforeach
  
          <div class="product">
          <div class="container">
              <div class="spec ">
                  <h3>{{trans('admin/dashboard.product')}}</h3>
                  <div class="ser-t">
                      <b></b>
                      <span><i></i></span>
                      <b class="line"></b>
                  </div>
              </div>
                  <div class=" con-w3l agileinf">
                      @foreach ($Products as $Product)
                      <div class="col-md-3 pro-1">
                        <div class="col-m">
                        <a href="#" data-toggle="modal" data-toggle="modal"
                        data-target="#show{{ $Product->id }}" class="offer-img">
                                <img src="{{asset('uploads/'.$Product->image)}}" class="img-responsive" alt="">
                             
                            </a>

                            <div class="mid-1">
                                <div class="women">

                                    <h6>

                                        <a class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#show{{ $Product->id }}">{{ $Product->product_name_ar }}</a>

                                        </h6>

                                    </div>
                                <div class="mid-2">
                                    {{-- <p ><label>$7.00</label><em class="item_price">$6.00</em></p> --}}
                                    <p>
                                        @foreach (App\Models\price::where('product_id' , $Product->id)->get() as $Price )

                                    
                                        <b>السعر : {{ $Price->price}}         </b>
                            
                                        <b>       الحجم : {{ $Price->size}}    </b>
                                        {{-- <br> --}}
                                        @endforeach </p>
                                      {{-- <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div> --}}
                                    <div class="clearfix"></div>
                                </div>
                                {{-- <div class="add">
                                   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="24" data-name="Wheat" data-summary="summary 24" data-price="6.00" data-quantity="1" data-image="images/of24.png">Add to Cart</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- edit_modal_Category -->
                    <div class="modal fade" id="show{{ $Product->id }}"  tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                       id="exampleModalLabel">
                                       عرض المنتج
                                   </h5>
                                   <button type="button" class="close" data-dismiss="modal"
                                           aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
                                <br>
                                {{-- <h3> عرض المنتج</h3> --}}
                                
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                       id="exampleModalLabel">
                                       {{ $Product->product_name_ar }}
                                </h5>
                                <p>{{$Product->decription}}</p>
                                <br>

                                <img src="{{asset('uploads/'.$Product->image)}}" class="img-responsive" alt="">
                                <p>
                                    @foreach (App\Models\price::where('product_id' , $Product->id)->get() as $Price )

                                    <b>السعر : {{ $Price->price}}         </b>
                            
                                    <b>الحجم : {{ $Price->size}}</b>
                                    {{-- <b>||</b> --}}
                                    <br>
                                    @endforeach </p>

                                    <form method="POST" action="{{ route('AbuEskandar.update_product_view',[$Product->id]) }}">
                                        @csrf
                                        {{method_field('put')}}
                                        <input type="hidden" value="{{ $CategoryImage->id }}" name="category_id">
                                        <input type="hidden" value="{{ $Product->views + 1  }}" name="views">
                                        <button type="submit"
                                                           class="btn btn-success">تم</button>
                                    </form>
                               </div>
                           </div>
                       </div>
                   </div>
                      @endforeach


                              <div class="clearfix"></div>
                           </div>
          </div>
      </div>
@endsection
