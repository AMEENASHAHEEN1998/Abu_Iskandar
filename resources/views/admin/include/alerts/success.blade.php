@if(Session::has('success'))
    {{-- <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div> --}}

    <div class="alert alert-success">{{ session('success') }}</div>
    <script>

        function fireSweetAlert() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            })
        }
    
    </script>
@endif
