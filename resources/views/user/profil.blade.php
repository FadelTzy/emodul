@extends('ub')

@section('css')
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">

@endsection

@section('title')
    Profile
@endsection
@section('content')
<div class="main-container container">
   

  
    <div class="row">
        <div class="col-10 mx-auto py-5">
            <h5 class="text-secondary mb-2">Profil Siswa</h5>
            <form id="formuser" class="mb-4" action="">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <input type="text" name="nama" class="form-control" value="{{$user->name}}">
                <br>
                <input type="text" name="nis" class="form-control" value="{{$user->username}}">
                <br>
                <input type="text" name="kelas" class="form-control" value="{{$user->kelas}}">
                <br>
                <input type="text" name="no" class="form-control" value="{{$user->no}}">
                <br>
                <input type="text" name="password" class="form-control" placeholder="isi password baru">

                <!-- Include optional progressbar HTML -->
            </form>
            <button id="formbtn" type="button" class="btn btn-primary btn-sm">Simpan</button>

        </div>
    </div>




</div>
@endsection


@push('js')
    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>
   
    <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>

   <script>
        $("#formbtn").on('click', function() {
            $("#formuser").trigger('submit');
        });
        var url = window.location.origin;
        $("#formuser").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('profilstore') }}',
                data: data,
                type: "POST",

                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div><ul>';

                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        iziToast.error({
                            title: 'Error',
                            message: elem,
                            position: 'topRight'
                        });

                    } else {

                        iziToast.success({
                            title: 'Sukses Menyimpan Data',
                            message: elem,
                            position: 'topRight'
                        });                
                        }
                }
            })


        });
   </script>
@endpush
