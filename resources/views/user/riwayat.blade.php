@extends('ub2')

@section('css')
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">
@endsection

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="main-container container">
        <!-- balance -->
        <div class="row my-4 text-left">
            <div class="col-12">
                <h3 class="fw-light mb-2">Riwayat Skor</h3>
            </div>
        </div>

        <!-- income expense-->
        <div class="row mb-4">
            @foreach ($his as $item)
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                                    <div class="icons bg-success text-white rounded-12">
                                        <i class="bi bi-question-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 align-self-center ps-0">
                                <p class="size-10 text-secondary mb-0">Tanggal {{$item->created_at->format('Y-m-d')}}</p>
                                <h4>Skor : {{round($item->nilai,2)}}</h4>

                            </div>
                            <div class="col">
                                <p>Benar : {{$item->benar}}</p>
                                <p>Salah : {{$item->benar}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
         
        </div>

        <!-- categories list -->







    </div>
@endsection


@push('js')
    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>

    <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
@endpush
