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
        <div class="row mb-3">
            <div class="col">
                <h5 class="fw-light mb-2">List Materi</h5>

                <h6 class="title">{{ $pembel->keterangan }}</h6>
            </div>
            <div class="col-auto align-self-center">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-sm"><i
                        class="bi bi-search"></i></button>
            </div>
        </div>
        <div class="row" id="tempatmateri">
            @foreach ($materi as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ url('user/materi/') . '/' . $item->id_pembelajaran . '/' . $item->id }}" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        @if ($item->gambar)
                                            <img src="{{ asset('file/gambarmateri/') . '/' . $item->gambar }}"
                                                alt="{{ $item->nama_materi }}">
                                        @else
                                            <img src="{{ asset('file/gambarmateri/download.png') }}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">{{ $item->nama_materi }}</p>
                                    {{-- <p class="text-muted size-12">Get $10 instant as reward while your friend or invited
                                    member join finwallapp</p> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <form id="formuser" action="">
                            <div class="input-group mb-3">
                                @csrf
                                <input type="hidden" name="pembelajaran" value="{{Request::segment(3)}}">
                                <input type="text" class="form-control" name="search"  
                                    aria-label="Search" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="formbtn"><i class="bi bi-search"></i></span>

                            </div>
                        </form>
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
    <script>
      
        $("#formbtn").on('click', function() {
            $("#formuser").trigger('submit');
        });
        
        var url = window.location.origin;
        function funcImg(gmb) {
            if (gmb) {
                return `<img src="${url + '/file/gambarmateri/' + gmb}" >`;
            }else{
                return `<img src="${url + '/file/gambarmateri/download.png'}" >`;
            }
        }
        $("#formuser").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('user/getsearch') }}',
                data: data,
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    
                    var html = '';
                    $("#tempatmateri").html(html)
                    id.forEach(element => {
                        html += `
                        <div class="col-12 col-md-6 col-lg-4">
                    <a href="${url + '/user/materi/' + element.id_pembelajaran + '/' + element.id} " class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        ${funcImg(element.gambar)}
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">${element.nama_materi}</p>
                                   
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                        `;
                    }); 
                    console.log(html)
                    $("#tempatmateri").html(html)
                }
            })


        });

    </script>
@endpush
