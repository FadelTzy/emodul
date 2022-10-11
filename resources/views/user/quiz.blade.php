@extends('ub2')

@section('css')
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('title')
    Mulai Kuiz
@endsection
@section('content')
    <div class="main-container container">


        <div class="row mb-2">
            <div class="col-12">
                <p id="timer" class="stopwatch text-end">00:00</p>
      
                <a href="#" class="btn btn-light btn shadow-sm mb-4 w-100">Soal Nomor <span id="stepnomor"></span>
                    dari
                    {{ $quiz->count() }} Soal
                </a>
            </div>
            <br>

        </div>



        <div class="row">
            <div id="smartwizard">
                <form id="formquiz" action="">
                    @csrf
                    <input type="hidden" name="jumlah" value="{{ $quiz->count() }}">
                    <ul class="nav d-none">
                        @php
                            $stepp = 1;
                        @endphp
                        @foreach ($quiz as $item)
                            <li class="nav-item">
                                <a class="nav-link " href="#step-{{ $stepp }}">

                                </a>
                            </li>
                            @php
                                $stepp++;
                            @endphp
                        @endforeach

                    </ul>


                    <div class="tab-content">
                        @php
                            $step = 1;
                        @endphp
                        @foreach ($quiz as $item)
                            <div id="step-{{ $step }}" class="tab-pane" role="tabpanel"
                                aria-labelledby="step-{{ $step }}">
                                <div class="row">
                                    <div class="col-12 mx-auto profile-page">
                                        <div class="clearfix"></div>
                                        <div class="circle small one"></div>
                                        <div class="circle small two"></div>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="282.062" height="209.359" viewBox="0 0 282.062 209.359" class="menubg">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#09b2fd" />
                                                    <stop offset="1" stop-color="#6b00e5" />
                                                </linearGradient>
                                            </defs>
                                            <path id="profilebg"
                                                d="M751.177,233.459c-28.511,1.567-38.838,7.246-61.77,27.573s-27.623,71.926-65.15,70.883-27.624-21.369-79.744-40.132-47.13-53.005-23.676-84.8,4.009-57.671,33-75.867,83.269,30.223,127.232,21.5,64.157-41.353,82.329-26,5.953,29.138,8.773,46.369,13.786,23.5,13.786,37.91S779.688,231.893,751.177,233.459Z"
                                                transform="translate(-503.892 -122.573)" fill="url(#linear-gradient)" />
                                        </svg>


                                        <div class="row my-1">
                                            <div class="col-12 align-self-center">

                                                <p class="text-bold">{!! $item->soal !!}</p>

                                            </div>
                                            <div class="col align-self-center">
                                                <figure class="avatar avatar-10 rounded-20 p-1 bg-white shadow-sm text-10">
                                                </figure>
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <br>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <input type="hidden" name="soal{{ $step }}" value="{{ $item->id }}">
                                    <div class="col-12 mb-1">
                                        <a href="#" class="btn btn-light btn shadow-sm text-start w-100"> <input
                                                type="radio" value="a" id="pilihan{{ $item->id }}a"
                                                name="pilihan{{ $step }}" class="form-contol text-end">
                                            <label onclick="checkRadio({{ $step }})"
                                                for="pilihan{{ $item->id }}a">{{ $item->pilihan_a }}</label> </a>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <a href="#" class="btn btn-light btn shadow-sm text-start w-100"> <input
                                                type="radio" value="b" id="pilihan{{ $item->id }}b"
                                                name="pilihan{{ $step }}" class="form-contol text-end">
                                            <label onclick="checkRadio({{ $step }})"
                                                for="pilihan{{ $item->id }}b">{{ $item->pilihan_b }}</label> </a>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <a href="#" class="btn btn-light btn shadow-sm text-start w-100"> <input
                                                type="radio" value="c" id="pilihan{{ $item->id }}c"
                                                name="pilihan{{ $step }}" class="form-contol text-end">
                                            <label onclick="checkRadio({{ $step }})"
                                                for="pilihan{{ $item->id }}c">{{ $item->pilihan_c }}</label> </a>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <a href="#" class="btn btn-light btn shadow-sm text-start w-100"> <input
                                                type="radio" value="d" id="pilihan{{ $item->id }}d"
                                                name="pilihan{{ $step }}" class="form-contol text-end">
                                            <label onclick="checkRadio({{ $step }})"
                                                for="pilihan{{ $item->id }}d">{{ $item->pilihan_d }}</label> </a>
                                    </div>
                                </div>
                            </div>
                            @php
                                $step++;
                            @endphp
                        @endforeach

                    </div>

                    <!-- Include optional progressbar HTML -->
                </form>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col-5">
                <button id="kembalibtn" onclick="smartPrev()" class="btn btn-warning btn shadow-sm  w-100">Kembali
                </button>
            </div>
            <div class="col-2">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn shadow-sm  w-100"><i
                        class="bi bi-ui-radios-grid"></i> </a>
            </div>
            <div class="col-5">
                <button id="selanjutnyabtn" onclick="smartNext()"
                    class="btn btn-success btn shadow-sm w-100">Selanjutnya</button>
            </div>
            <div class="col-12 mt-4">
                <button id="submitbtn" class="btn btn-info btn shadow-sm w-100">Selesai</button>
            </div>
        </div>


    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @php
                            $sm = 1;
                        @endphp
                        @foreach ($quiz as $item)
                            <div onclick="goTo({{ $sm }})"
                                class="col-3 col-sm-3 col-md-2 mb-2 text-center col-lg-1"><a
                                    href="#step-{{ $sm }}" id="navigate{{ $sm }}"
                                    class="btn btn-primary">No. {{ $sm }}</a></div>
                            @php
                                $sm++;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <!-- JS Libraies -->
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>

    <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>

    <script>
            var sec = 0;
        var min = 0;
        $("#submitbtn").on('click', function() {
            $("#formquiz").trigger('submit');
        });
        var url = window.location.origin;
        $("#formquiz").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('postquiz') }}',
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
                        $("#formquiz").trigger('reset')
                        alert('Data telah tersimpan');

                        var id = id.data.id;
                        window.location.replace(url + "/user/report/" + id);
                    }
                }
            })


        });
        $('#smartwizard').smartWizard({
            selected: 0, // Initial selected step, 0 = first step
            theme: 'default', // theme for the wizard, related css need to include for other than default theme
            justified: true, // Nav menu justification. true/false
            autoAdjustHeight: true, // Automatically adjust content height
            backButtonSupport: true, // Enable the back button support
            enableUrlHash: true, // Enable selection of the step based on url hash
            transition: {
                animation: 'fade', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
                speed: '200', // Animation speed. Not used if animation is 'css'
                easing: '', // Animation easing. Not supported without a jQuery easing plugin. Not used if animation is 'css'
                prefixCss: '', // Only used if animation is 'css'. Animation CSS prefix
                fwdShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on forward direction
                fwdHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on forward direction
                bckShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on backward direction
                bckHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on backward direction
            },
            toolbar: {
                position: 'none', // none|top|bottom|both
                showNextButton: false, // show/hide a Next button
                showPreviousButton: false, // show/hide a Previous button
                extraHtml: '' // Extra html to show on toolbar
            },
            anchor: {
                enableNavigation: false, // Enable/Disable anchor navigation 
                enableNavigationAlways: false, // Activates all anchors clickable always
                enableDoneState: false, // Add done state on visited steps
                markPreviousStepsAsDone: false, // When a step selected by url hash, all previous steps are marked done
                unDoneOnBackNavigation: false, // While navigate  + idb.removeClass('btn-primary');ack, done state will be cleared
                enableDoneStateNavigation: false // Enable/Disable the done state navigation
            },
            keyboard: {
                keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                keyLeft: [37], // Left key code
                keyRight: [39] // Right key code
            },

            disabledSteps: [], // Array Steps disabled
            errorSteps: [], // Array Steps error
            warningSteps: [], // Array Steps warning
            hiddenSteps: [], // Hidden steps
            getContent: null // Callback function for content loading
        });

        function smartPrev() {
            $('html, body').animate({
                scrollTop: '0px'
            }, 300);

            $('#smartwizard').smartWizard("prev");
        }

        function goTo(step) {
            $('#smartwizard').smartWizard("goToStep", step - 1, true);

        }

        function checkRadio(id) {
            $("#navigate" + id).removeClass('btn-primary');
            $("#navigate" + id).addClass('btn-success');

        }

        function smartNext() {
            $('html, body').animate({
                scrollTop: '0px'
            }, 300);

            $('#smartwizard').smartWizard("next");
        }
        $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
            $("#stepnomor").html(stepIndex + 1);
            $("#exampleModal").modal('hide')
            if (stepPosition == 'last') {
                $("#selanjutnyabtn").addClass("d-none")
            } else {
                $("#selanjutnyabtn").removeClass("d-none")

            }
            if (stepPosition == 'first') {
                $("#kembalibtn").addClass("d-none")
            } else {
                $("#kembalibtn").removeClass("d-none")

            }
        });
    </script>
    <script>
    
        function callme() {
            alert('Times Up!!');
            $("#formquiz").trigger('submit');

        }
        var handler = function() {

           
            sec = sec + 1;
            
            console.log(sec)
            document.getElementById("timer").textContent = (min < 10 ? "0" + min : min) + ":" + (sec < 10 ? "0" + sec :
                sec);
            if (sec == 60) {
                sec = 0;
                min = min + 1;
                if (min == '{{$set->waktu}}') {
                    callme();
                }
            }
        };
        setInterval(handler, 1000);
        handler();
    </script>
@endpush
