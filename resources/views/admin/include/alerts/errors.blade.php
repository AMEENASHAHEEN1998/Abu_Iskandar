@if(Session::has('errormsg'))
    {{-- <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div> --}}
    <div class="alert alert-danger">{{ session('errormsg') }}</div>

@endif



