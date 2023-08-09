@extends('layouts.master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <style>
        .component-card_1 {
            width: auto;
        }

        .form-control {
            height: calc(1.5em + 0.75rem + 2px)
        }
        .tb-header{
            padding: 0 .75rem
        }
        p.tb-header{
            margin: 0;
            font-size: .75rem;
        }
        .form-control.is-invalid, .was-validated .form-control:invalid {
            background-image: none
        }
        .component-card_res {
            width: 70rem;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <!-- CONTENT AREA -->
    <div class="row">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100"">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Define My Outcome'])
                </ol>
            </nav>
            @include('inc.tool-nav')
        </div>
        {{-- breadcrumbs --}}
        {{-- Tool Page --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing" id="toolPage">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    {{-- justify-content-center --}}
                    <div class="d-flex "> 
                        <p class="text-dark tb-header header-1"></p>
                        <p class="text-dark tb-header header-2"></p>
                        <p class="text-dark tb-header header-3">
                            (1 {{__('common.most')}}, 5 {{__('common.least')}}) <br>
                        </p>
                        <p class="text-dark tb-header header-4">
                            (1 {{__('common.most')}}, 5 {{__('common.least')}}) <br>
                        </p>
                        <p class="text-dark tb-header header-5">
                            (1 {{__('common.most')}}, 5 {{__('common.least')}}) <br>
                        </p>
                        <p class="text-dark tb-header header-6">
                            (5 {{__('common.most')}}, 1 {{__('common.least')}}) <br>
                        </p>
                        <p class="text-dark tb-header header-7">
                            (5 {{__('common.most')}}, 1 {{__('common.least')}}) <br>
                        </p>
                        <p class="text-dark tb-header header-8">
                            (5 {{__('common.most')}}, 1 {{__('common.least')}}) <br>
                        </p>
                        <div class="text-dark tb-header"></div>
                    </div>
                    <hr>
                    <div class="d-flex "> 
                        <div class="">#</div>
                        <div class="text-dark tb-header header-1">
                            <h6 class="info-haeding bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.Potential Priorities')}}">
                                {{__('common.Potential Priorities')}}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-2 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.Do you anticipate when to start with this goal?')}}">
                            <h6 class="info-haeding">
                                {{__('common.Predicted Ranking')}}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-3 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.How much time do I need to get this up and running and take advantage of it? Remember the speed of the application')}}">
                            <h6 class="info-haeding">
                                {{__('common.Time (Upfront)')}}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-4 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.How long do I need to expand and maintain my level? Remember the opportunity cost')}}">
                            <h6 class="info-haeding">
                                {!!__('common.Time (Ongoing)')!!}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-5 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.Do I now have (or can easily acquire) the skills I will need? What is the probability of success? How much variance is the potential outcome?')}}">
                            <h6 class="info-haeding">
                                {{__('common.Difficulty')}}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-6 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.How much do I enjoy that idea? Am I having fun or will I need willpower to keep going?')}}">
                            <h6 class="info-haeding">
                                {{__('common.Enjoyment')}}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-7 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.What is the immediate effect? What short term benefits can it create? momentum builds on itself')}}">
                            <h6 class="info-haeding">
                                {!!__('common.Impact (90 day)')!!}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-8 bs-popover-warning rounded" data-container="body" data-placement="top" data-trigger="hover" data-content="{{__('common.What is the impact on my life plans and goals? Are the skills and experience I will gain worth acquiring even if I don\'t succeed?')}}">
                            <h6 class="info-haeding ">
                                {!!__('common.Impact (25 yr)')!!}
                            </h6>
                        </div>
                        <div class="text-dark tb-header header-0 ">
                            <h6 class="info-haeding ">
                                {{__('common.Total Score')}}
                            </h6>
                        </div>
                    </div>
                    <livewire:define-tool local="{{explode('/', request()->path())[0]}}" />
                </div>
            </div>
        </div>
        {{-- Tool Page --}}
        {{-- Output Page --}}
        <div class="col-12 layout-top-spacing layout-spacing d-none" id="semiFinal">
            <div class="row justify-content-center">
                {{--  --}}
                <div class="col-12">
                    <div class="card component-card_1 component-card_res">
                        <div class="card-body">
                            <h5 class="text-center">{{ __('common.Define My Outcome') }}</h5>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="text-center">
                        <h5 class="info-heading mb-4 mt-2">{{__('common.Are you sure of the entered data?')}}</h5>
                        <div class="d-flex justify-content-center">
                            <div>
                                <button onclick="pagesToggle()" class="btn btn-info ml-2 btn-lg">{{__('common.previous')}}</button> 
                                <button onclick="window.location.reload()" class="btn btn-info ml-2 btn-lg">{{__('common.Retry')}}  </button> 
                                <button onclick="save()" class="btn btn-info ml-2 btn-lg submit">{{__('common.finalSave')}} </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
        {{-- Output Page --}}
    </div>

    <!-- CONTENT AREA -->
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $('.header-0').width(`${$('.cell-0').width()}`)
        $('.header-1').width(`${$('.cell-1').width()}`)
        $('.header-2').width(`${$('.cell-2').width()}`)
        $('.header-3').width(`${$('.cell-3').width()}`)
        $('.header-4').width(`${$('.cell-4').width()}`)
        $('.header-5').width(`${$('.cell-5').width()}`)
        $('.header-6').width(`${$('.cell-6').width()}`)
        $('.header-7').width(`${$('.cell-7').width()}`)
        $('.header-8').width(`${$('.cell-8').width()}`)

        var myChart = null;

        const semiFinal = () => {

            let valid = true;
            $('input').each(function(){
                if ($(this).val() == "") {
                    $(this).addClass('is-invalid')
                    valid = false
                }
            })

            if (!valid) 
                return swalFire("{{__('common.Error At least one row must be filled')}}")

            let result = [];
            let ppResult = [];

            $('.total input').each(function(){
                if ($(this).val() != 0)
                    result.push(+$(this).val())
            })

            if (result.length == 0) {
                $('input').each(function(){
                    if ($(this).val() == "")
                        $(this).addClass('is-invalid')
                })
                return swalFire("{{__('common.Error At least one row must be filled')}}")
            }
         
            $('.ppText').each(function(){
                if ($(this).val())
                    ppResult.push($(this).val())
            })

            window.onbeforeunload = function(){}

            if (myChart != null)
                    myChart.destroy();

                renderRes(result, ppResult)
                pagesToggle()
        }

        const pagesToggle = () => {
            $('#semiFinal').toggleClass('d-none')
            $('#toolPage').toggleClass('d-none')
        }

        const renderRes = (res, ppResult) => {
            var ctx = $('#myChart');
            let result = res
            let labels = ppResult

            let backgroundColor = [
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
                'rgb(201, 203, 207)',
                '#5c1ac3',
                '#ffe1e2',
                '#e2a03f',
            ]
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: labels,
                        data: result,
                        backgroundColor: backgroundColor
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            enabled: false,
                        },
                        legend: {
                            display: false,
                        },
                    }
                }
            });
        }

    </script>
@endpush
