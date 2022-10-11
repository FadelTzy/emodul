@extends('ub')

@section('css')
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">

@endsection

@section('title')
    Tentang
@endsection
@section('content')
<div class="main-container container">
   

  
    <div class="row">
        <div class="col-10 mx-auto py-5">
            <h5 class="text-secondary mb-0">Tentang Aplikasi</h5>
            <h1 class="display-4 mb-0">{{$set->nama}}</h1>
            <h5 class="text-secondary">Mobile E - Modul App</h5>
            <br>
            <p class="text-secondary">{{$set->deskripsi}} <br> <span
                    class="text-danger">Made with ❤</span></p>
        </div>
    </div>




</div>
@endsection


@push('js')
    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>
   
    <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>

   
@endpush
