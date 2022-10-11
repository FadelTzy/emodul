@extends('ub2')

@section('css')
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">
@endsection

@section('title')
    Materi
@endsection
@section('content')
    <div class="main-container container">
        <div class="row sticky-top">
            <div class="col-12 px-0">
                <div class="card mb-4 overflow-hidden shadow-sm card-theme text-white rounded-0">
                    <div class="overlay"></div>
                    <div  class="coverimg h-100 w-100 position-absolute opacity-4 ">
                        @if ($materi->gambar)
                            <img src="{{ asset('file/gambarmateri/') . '/' . $materi->gambar }}"
                                alt="{{ $materi->nama_materi }}">
                        @else
                            <img src="{{ asset('file/gambarmateri/download.png') }}" alt="">
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <span class="tag bg-theme">{{ $materi->oMateri->keterangan }}</span>
                            </div>
                            <div class="col-auto">

                            </div>
                        </div>
                        <br>
                        <a href="blogdetails.html"
                            class="h4 mb-1 text-normal d-block text-white">{{ $materi->nama_materi }}</a>
                        <p class="mb-3">Published on: {{ $materi->created_at->format('Y / m / d') }}</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col align-self-center">

                <nav>
                    <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                        <button class="btn btn-outline-primary active text-normalcase" id="nav-thumbnails-tab"
                            data-bs-toggle="tab" data-bs-target="#nav-thumbnails" type="button" role="tab"
                            aria-controls="nav-thumbnails" aria-selected="true">
                            Materi
                        </button>
                        <button class="btn btn-outline-primary ms-2 text-normalcase" id="nav-lists-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-lists" type="button" role="tab" aria-controls="nav-lists"
                            aria-selected="false">
                            Video
                        </button>
                        <button class="btn btn-outline-primary ms-2 text-normalcase" id="nav-listss-tab"
                            data-bs-toggle="tab" data-bs-target="#nav-listss" type="button" role="tab"
                            aria-controls="nav-listss" aria-selected="false">
                            File
                        </button>
                    </div>
                </nav>
            </div>
            <div class="col-auto">
                <h6 class="title">Pembelajaran</h6>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-thumbnails" role="tabpanel"
                        aria-labelledby="nav-thumbnails-tab">
                        <br>
                        <!-- product medsize box  -->
                        <div class="row">
                            @if ($materi->oText->count() == 0)
                            <div class="col-12 col-md-12 ">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        Materi Belum Tersedia
                                    </div>
                                </div>
                            </div>
                            @else
                            @foreach ($materi->oText as $item)
                                <div class="col-12 col-md-12 col-lg-12 mx-auto">
                                    <h5 class="mb-3">{{ $item->nama_text }}</h5>

                                    <p class="text-secondary">{!! $item->isi !!}</p>


                                </div>
                                <hr>
                            @endforeach
                            @endif

                        </div>

                        <!-- product medsize box no gap -->


                    </div>
                    <div class="tab-pane fade" id="nav-lists" role="tabpanel" aria-labelledby="nav-lists-tab">

                        <!-- product medsize list  -->
                        <div class="row mb-2">
                            @if ($materi->oVideo->count() == 0)
                            <div class="col-12 col-md-12 ">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        Video Belum Tersedia
                                    </div>
                                </div>
                            </div>
                            @else
                            @foreach ($materi->oVideo as $item)
                            <div class="col-12 col-md-12 ">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="mb-3">{{ $item->judul }}</h5>

                                        <iframe width="100%" height="315" src="{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                          
                     
                      


                        </div>


                    </div>
                    <div class="tab-pane fade" id="nav-listss" role="tabpanel" aria-labelledby="nav-listss-tab">

                        <!-- product medsize list  -->
                        <div class="row mb-2">
                            @if ($materi->oFile->count() == 0)
                            <div class="col-12 col-md-12 ">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        File Belum Tersedia
                                    </div>
                                </div>
                            </div>
                            @else
                               @foreach ($materi->oFile as $item)
                             

                             <div class="col-12 col-md-6 ">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto position-relative">
                                                <div class="position-absolute end-0 top-0 px-2 py-1 mx-2 z-index-1 ">
                                             
                                                </div>
                                                <figure class="avatar avatar-80 rounded-15 border">
                                                    <img src="{{asset('file/gambarmateri/do.png')}}" alt="" class="w-100">
                                                    {{-- <i class="bi bi-earmark-arrow-down"></i> --}}
                                                </figure>
                                            </div>
                                            <div class="col position-relative">
                                                <div class="position-absolute end-0 top-0 z-index-1 ">
                                               
                                                </div>
                                                <p class="mb-0"><small class="text-muted size-12">File Pembelajaran </small>
                                                </p>
                                                <h5>{{$item->nama_file}}</h5>
                                                <a download="{{$item->nama_file}}" href="{{asset('file/materi/') .'/' . $item->isi}}" class="btn btn-sm px-0 text-color-theme">
                                                    <i class="bi bi-download"></i> Unduh
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                               @endforeach 
                            @endif
                           
                        


                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- Blogs/News Content  -->





    </div>
@endsection


@push('js')
    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>

    <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
@endpush
