@extends('layouts.master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('plugins/jquery-step/jquery.steps.css') }}" rel="stylesheet" type="text/css" />
    <style>
        #formValidate .wizard>.content {
            min-height: 25em;
        }

        #example-vertical.wizard>.content {
            min-height: 24.5em;
        }

        .component-card_1 {
            width: auto;
            padding: 1.5rem;
            height: 100%;
        }

        .wizard>.content {
            background: white
        }

        h5 {
            text-align: center
        }

        .form-check-input {
            position: unset;
            margin: 0;
        }

        .selected {
            transition: all .4s ease;
            background-color: #3b3f5c !important;
            border-color: #3b3f5c !important;
            box-shadow: 0 10px 20px -10px #3b3f5c !important;
        }

        .selected p {
            color: white !important;
        }
        img{
            border-radius: 8px;
            height: 200px;

        }
        .card-body p {
            font-weight: bolder;
            font-size: large;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div class="row">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Personal Assesment'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing" id="finalPage">
            <div class="card component-card_1">
                <div class="card-body ">
                    <div id="circle-basic" class="">
                        <h3></h3>
                        <section>
                            <h5 class="mb-5">
                                {{ __('common.choose only 4 cards') }}
                            </h5>
                            <div class="secBody text-ar">
                                <form action="" id="phase1Form">
                                    <div class="row">
                                        @foreach (config('resources.personal') as $stmt)
                                            <div class="col-md-4 mb-4">
                                                <div class="card component-card_1 pointer personalBox"
                                                    data-index="{{ $loop->index }}">
                                                    <img src="{{asset("assets/personal/{$stmt['image']}")}}" alt="">
                                                    <div class="card-body">
                                                        <p class="">
                                                            {{ __("common.{$stmt['content']}") }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </section>
                        <h3></h3>
                        <section>
                            <h5 class="mb-5">
                                {{ __('common.choose only 2 cards') }}
                            </h5>
                            <div class="secBody text-ar">
                                <div class="row">
                                    @foreach (['', '', '', ''] as $item)
                                        <div class="col-md-4 mb-4">
                                            <div class="card component-card_1 pointer personalBox"
                                                data-index="{{ $loop->index }}">
                                                <img id="personalPhaseImage2{{ $loop->index }}" src="" alt="">
                                                <div class="card-body">
                                                    <p id="personalPhase2{{ $loop->index }}" class=""></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <h3></h3>
                        <section>
                            <h5 class="mb-5">
                                {{ __('common.choose only 1 cards') }}
                            </h5>
                            <div class="secBody text-ar">
                                <div class="row">
                                    @foreach (['', ''] as $item)
                                        <div class="col-md-4 mb-4">
                                            <div class="card component-card_1 pointer personalBox"
                                                data-index="{{ $loop->index }}">
                                                <img id="personalPhaseImage3{{ $loop->index }}" src="" alt="">
                                                <div class="card-body">
                                                    <p id="personalPhase3{{ $loop->index }}" class=""></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    {{-- <div class="text-center">
                        <button class="btn btn-danger w-50" onclick="window.location.reload()">{{__('common.Retry')}}</button>
                    </div> --}}
                </div>
            </div>
        </div>
        <livewire:personal-tool token="{{ Request::input('token') }}" local="{{ explode('/', request()->path())[0] }}" />
    </div>
@endsection
@push('js')
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <script>
        let phaseTwoLocal = [
            "{{ __('common.personal20') }}",
            "{{ __('common.personal21') }}",
            "{{ __('common.personal22') }}",
            "{{ __('common.personal23') }}",
            "{{ __('common.personal24') }}",
            "{{ __('common.personal25') }}",
            "{{ __('common.personal26') }}",
            "{{ __('common.personal27') }}",
            "{{ __('common.personal28') }}",
        ];
        let phaseTwoLocalImages = [
            "{{asset('assets/personal/1.png')}}",
            "{{asset('assets/personal/2.png')}}",
            "{{asset('assets/personal/3.png')}}",
            "{{asset('assets/personal/4.png')}}",
            "{{asset('assets/personal/5.png')}}",
            "{{asset('assets/personal/6.png')}}",
            "{{asset('assets/personal/7.png')}}",
            "{{asset('assets/personal/8.png')}}",
            "{{asset('assets/personal/9.png')}}",
        ]
        let phaseTwoContent = [];
        let phaseTwoContentImages = [];
        let lastOptions = [];
        let picked = 0;
        let maxPicked = 4;
        let phase = 1;

        // $('[href="#previous"]').hide();
        $('[href="#next"]').hide();
        $('[href="#finish"]').hide();
        $('[href="#previous"]').text("{{ __('common.previous') }}")
        $('[href="#next"]').text("{{ __('common.next') }}")
        $('[href="#finish"]').text("{{ __('common.finish') }}")
        // $('[href="#previous"]').parent().before(`
        //     <li aria-hidden="false" aria-disabled="false"><a href="#">Retry</a></li>
        // `)

        window.onbeforeunload = function(){
            if ($('.selected').length != 0) {
                return 'Are you sure you want to leave?';
            }
        };

        $('.personalBox').on('click', function() {

            if ($(this).hasClass('selected')) {
                picked--
            } else {
                if (picked == maxPicked)
                    return swalFire("{{ __('common.You have exceeded the selection limit') }}")

                picked++
            }
            $(this).toggleClass('selected')
            if (picked == maxPicked) {
                (phase == 3) ? $('[href="#finish"]').show(): $('[href="#next"]').show();
            } else {
                (phase == 3) ? $('[href="#finish"]').hide(): $('[href="#next"]').hide();
            }

        })
        $('[href="#next"]').on('click', function() {

            let i = 0;
            phase++;
            $('.selected').each(function() {
                let index = $(this).data('index');
                $(this).removeClass('selected')

                if (phase == 3) {
                    lastOptions.push(phaseTwoContent[index])
                    $(`#personalPhase${phase}${i}`).text(phaseTwoContent[index])
                    $(`#personalPhaseImage${phase}${i}`).attr('src', phaseTwoContentImages[index])

                } else {
                    $(`#personalPhase${phase}${i}`).text(phaseTwoLocal[index])
                    $(`#personalPhaseImage${phase}${i}`).attr('src', phaseTwoLocalImages[index])

                    phaseTwoContent.push(phaseTwoLocal[index])
                    phaseTwoContentImages.push(phaseTwoLocalImages[index])
                }
                i++;
            })
            picked = 0;
            maxPicked = maxPicked / 2
            $('[href="#next"]').hide()
        })

        $('[href="#previous"]').on('click', function() {

            if (phase == 3) {
                lastOptions = []
            } else {
                phaseTwoContent = []
                phaseTwoContentImages = []
            }
            phase--;
            picked = 0;
            maxPicked = maxPicked * 2
            // $('[href="#next"]').show()
        })

        $('[href="#finish"]').on('click', function() {
            window.onbeforeunload = function(){}

            let finalResult = lastOptions[$('.selected').data('index')];

            semiFinal(finalResult);
            
            picked = 0;
            maxPicked = 1

            $('.personalBox').removeClass('selected')
            $('[href="#finish"]').hide()

        })
    </script>
@endpush
