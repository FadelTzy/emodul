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
            <h1> Profil
            </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Admin</h4>
                        </div>
                        <div class="card-body">

                            <form id="datakontak" action="{{ url('profil') }}" method="POST" enctype="multipart/form-data">
                                <div class="tab-content" id="myTabContent2">

                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="card">

                                            <div class="card-body">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input value="{{ Auth::user()->name }}" type="text"
                                                                name="nama" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>No</label>
                                                            <input value="{{ Auth::user()->no }}" type="text"
                                                                name="no" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input value="{{ Auth::user()->email }}" type="text"
                                                                name="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input value="{{ Auth::user()->username }}" type="text"
                                                                name="username" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Set Password Baru</label>
                                                            <input type="text" name="pass" class="form-control">
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
                                        <button type="submit" class="btn btn-warning">Simpan</button>


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
    <script src="{{ asset('/modules/izitoast/js/iziToast.min.js') }}"></script>
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
@endpush
