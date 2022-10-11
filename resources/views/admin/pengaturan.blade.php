@extends('ab')

@section('css')
<link rel="stylesheet" href="{{ asset('modules/izitoast/css/iziToast.min.css') }}">

@endsection

@section('title')
    Profil
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1> Pengaturan
            </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi LMS</h4>
                        </div>
                        <div class="card-body">

                            <form id="formsetting" >
                                <div class="tab-content" id="myTabContent2">

                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="card">

                                            <div class="card-body">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $d->id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input value="{{ $d->nama }}" type="text"
                                                                name="nama" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Deskripsi</label>
                                                            <input value="{{$d->deskripsi }}" type="text"
                                                                name="deskripsi" class="form-control">
                                                           
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Panduan</label>
                                                            <input  type="file"
                                                                name="file" class="form-control">
                                                                @if ($d->panduan)
                                                                    
                                                                <a class="btn btn-sm btn-primary" href="{{asset('file/panduan/') . '/' . $d->panduan}}">Terdapat File</a>
                                                                @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Logo</label>
                                                            <input  type="file"
                                                                name="logo" class="form-control">
                                                                @if ($d->logo)
                                                                    
                                                                <a class="btn btn-sm btn-primary" href="{{asset('file/logo/') . '/' . $d->logo}}">Terdapat File</a>
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jumlah Soal</label>
                                                            <input  type="text"
                                                                name="soal" value="{{$d->soal}}" class="form-control">
                                                             
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Waktu Pengerjaan (menit)</label>
                                                            <input  type="text"
                                                                name="waktu" value="{{$d->waktu}}" class="form-control">
                                                             
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right "></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="button" id="btnsetting" class="btn btn-warning">Simpan</button>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection


@push('js')
    <!-- Page Specific JS File -->
    <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>
    @if (session('message'))
        <script>
            iziToast.success({
                title: 'Succes!',
                message: 'Data tersimpan',
                position: 'topRight'
            });
        </script>
    @endif
    @if (session('status'))
        <script>
            var data = '{!! session('data') !!}';
            console.log(data)
            var parse = JSON.parse(data);
            iziToast.error({
                title: 'Error',
                message: data,
                position: 'topRight'
            });
        </script>
    @endif
    <script>
          $("#btnsetting").on('click', function() {
            $("#formsetting").trigger('submit');
        });
        $("#formsetting").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('pengaturan') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
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
                            title: 'Succes!',
                            message: 'Data tersimpan',
                            position: 'topRight'
                        });
                    location.reload();

                    }
                }
            })


        });
    </script>
@endpush
