@extends('ub')

@section('css')
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">

@endsection

@section('title')
    Mulai Kuiz
@endsection
@section('content')
<div class="main-container container">
   

  
  
    <div class="row">
        <div class="col-10 mx-auto profile-page">
            <div class="clearfix"></div>
            <div class="circle small one"></div>
            <div class="circle small two"></div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="282.062"
                height="209.359" viewBox="0 0 282.062 209.359" class="menubg">
                <defs>
                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                        gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#09b2fd" />
                        <stop offset="1" stop-color="#6b00e5" />
                    </linearGradient>
                </defs>
                <path id="profilebg"
                    d="M751.177,233.459c-28.511,1.567-38.838,7.246-61.77,27.573s-27.623,71.926-65.15,70.883-27.624-21.369-79.744-40.132-47.13-53.005-23.676-84.8,4.009-57.671,33-75.867,83.269,30.223,127.232,21.5,64.157-41.353,82.329-26,5.953,29.138,8.773,46.369,13.786,23.5,13.786,37.91S779.688,231.893,751.177,233.459Z"
                    transform="translate(-503.892 -122.573)" fill="url(#linear-gradient)" />
            </svg>


            <div class="row my-3 py-5">
                <div class="col-7 align-self-center">
                    <h1 class="mb-2"><span class="fw-light text-secondary">Mulai</span><br />Quiz</h1>
                    
                </div>
                <div class="col align-self-center">
                    <figure class="avatar avatar-10 rounded-20 p-1 bg-white shadow-sm text-10">
                         </figure>
                </div>
                <div class="col-12">
                    <br>
                    <br>
                    <p class="">{{$set->deskripsi}} <br> </p>
                </div>

               
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <a href="#" class="btn btn-light btn shadow-sm mb-4 w-100">{{$set->soal}} Soal : {{$set->waktu}} Menit </a>
        </div>
        <br>
        <div class="col-12">
            <a href="{{url('user/quiz')}}" class="btn btn-default btn shadow-sm w-100">Kerjakan</a>
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
