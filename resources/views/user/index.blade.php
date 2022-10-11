@extends('ub')

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
                <h1 class="fw-light mb-2">Selamat Datang</h1>
                <p class="text-secondary">Hi, {{ Auth::user()->name }}</p>
            </div>
        </div>

        <!-- income expense-->
        <div class="row mb-4">
            <div class="col-6">
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
                            <div class="col align-self-center ps-0">
                                <p class="size-10 text-secondary mb-0">Skor Quiz</p>

                                <p>{{$hq->nilai}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-40 p-1 shadow-sm shadow-danger rounded-15">
                                    <div class="icons bg-primary text-white rounded-12">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center ps-0">
                                <p class="size-10 text-secondary mb-0">Materi</p>

                                <p>{{$jml}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- categories list -->



        <!-- Companies -->
        <div class="row mb-2">
            <div class="col">
                <h6 class="title">Pelajaran Pokok</h6>
            </div>
            <div class="col-auto">
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($pl as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <a href="{{url('user/materi/') .'/'. $item->id}}">
                                <div class="avatar avatar-60 p-1 shadow-sm shadow-primary rounded-15 mb-3">
                                    <div class="icons bg-primary text-white rounded-12">
                                        <i class="bi bi-newspaper size-22"></i>
                                    </div>
                                </div>
                                <h6 class="mb-2">{{ $item->keterangan }}</h6>
                                <p class="text-secondary small mb-3">Materi bacaan.</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <!-- My Goals and Targets -->


        <!-- Dark mode switch -->

        <div class="row mb-2">
            <div class="col">
                <h6 class="title">Quiz</h6>
            </div>
            <div class="col-auto">
            </div>
        </div>
        <!-- offers banner -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card theme-bg overflow-hidden">
                    <a href="{{url('user/mulai')}}">
                    <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg right-center-img">
                        <img src="{{ asset('asset/img/offerbg.png') }}" alt="">
                    </figure>
                </a>
                    <div class="card-body py-4">
                        <div class="row">
                            <div class="col-9 align-self-center">
                                <h1 class="mb-3"><span class="fw-light">Mulai</span><br />Quiz</h1>
                                <p>Ukur kemampuanmu dengan mengerjakan soal E-Modul.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transactions -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                            <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activate Dark
                                Mode</label>
                        </div>
                    </div>
                </div>
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
