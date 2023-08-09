@extends('layouts.master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <style>
        .component-card_1 {
            width: auto;
            height: 100%;
        }
        .font-size-large{
            font-size: large
        }
        .component-card_res {
            width: 30rem;
        }
    </style>
    <link href="{{ asset('plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@php

$wheel = (object) [
    (object) [
        'title' => 'Health',
        'des' => (object) [
            'How well do you proceed with your daily activities, your energy flow?',
            'How much do you know about your health, do you do annual checkups?',
            'How is you diet? Do you take care of what kind of food or supplements your body needs?'
        ]
    ],
    (object) [
        'title' => 'Friends & Family',
        'des' => (object) [
            'How much fun, support, comfortable and peace do you find around them?',
            'How much of the real you can be expressed without judging around them?',
            'Do they energize, motivate, and push you to become better or the opposite?'
        ]
    ],
    (object) [
        'title' => 'Fun, Leisure & Recreation',
        'des' => (object) [
            'How much do you entertain yourself?',
            'What new fun activity do you explore every now and then?',
            'How well do you plan your fun, recreation moments?'
        ]
    ],
    (object) [
        'title' => 'Wealth, Leisure & recreation',
        'des' => (object) [
            'Do you feel abundant or scarce?',
            'Do you have the knowledge and mindset of wealth?',
            'How about people around you are they financially abundant?',
        ]
    ],
    (object) [
        'title' => 'Relationship',
        'des' => (object) [
            'How well is your communication and respect to one another?',
            'How well do you both express love and gratitude to one another?',
            'How much fun and sharing do you have in your relationship?',
        ]
    ],
    (object) [
        'title' => 'Learning & Personal Growth',
        'des' => (object) [
            'How much do you put time for you to sharpen your skills?',
            'How much focus do you put to develop better characteristics than you have now?',
            'How much do you spend money in self-educating?',
        ]
    ],
    (object) [
        'title' => 'Spiritual',
        'des' => (object) [
            'How well are you connected to God?',
            'How well is your faith and serenity when things are not well?',
            'How many times do you feel gratitude to his grace?'
        ]
    ],
    (object) [
        'title' => 'Career',
        'des' => (object) [
            'Do you feel your work is part of who you really are, you feel passionate about?',
            'Does it help you grow- challenge your potentials?',
            'Do you have a good time working in this field, do you enjoy it?',
        ]
    ],
]
@endphp
@section('content')
    <div class="row ">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Wheel of Life'])
                </ol>
            </nav>
            @include('inc.tool-nav')
        </div>
        {{-- breadcrumbs --}}
        {{-- Tool Page --}}
        <div class="col-12 layout-top-spacing layout-spacing justify-content-center" id="toolPage">
            <h5 class="mr-4 ml-4 mt-5 text-ar">{{__('common.Example of questions to open your mind on how you want to scale each area.')}}</h5>
            <div class="row ">
                {{--  --}}
                @foreach ($wheel as $item)
                    <div class="col-md-6 p-4">
                        <div class="card component-card_1">
                            <div class="card-body">
                                <h5 class="card-title text-ar">{{ __("common.$item->title") }}</h5>
                                <ul class="text-dark text-ar">
                                    @foreach ($item->des as $des)
                                        <li>{{ __("common.$des") }}</li>
                                    @endforeach
                                </ul>
                                <div class="custom-progress @if(LaravelLocalization::getCurrentLocale() == 'en') top-right @endif progress-up" style="width: 100%">
                                    <div class="range-count"><span class="range-count-number font-size-large" data-rangecountnumber="0">0</span></div>
                                    <input type="range" min="0" max="10" class="custom-range progress-range-counter" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="p-4  w-100 @if(LaravelLocalization::getCurrentLocale() == 'en') text-right  @endif">
                    {{-- <button class="btn btn-danger btn-lg" onclick="window.location.reload()">{{__('common.Retry')}}</button> --}}
                    <button onclick="semiFinal()" class="btn btn-info btn-lg">{{__('common.finish')}}</button>
                </div>
                {{--  --}}
            </div>
        </div>
        <livewire:wheel-tool local="{{explode('/', request()->path())[0]}}"/>
        {{-- Tool Page --}}
        {{-- Output Page --}}
        <div class="col-12 layout-top-spacing layout-spacing " id="semiFinal">
            <div class="row justify-content-center">
                {{--  --}}
                <div class="col-12">
                    <div class="card component-card_1 component-card_res">
                        <div class="card-body">
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
                                <button onclick="" class="btn btn-info ml-2 btn-lg submit">{{__('common.finalSave')}} </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
        {{-- Output Page --}}
    </div>
@endsection
@push('js')

    <script src="{{ asset('plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $('#semiFinal').fadeOut()
        window.onbeforeunload = function(){
            if ($('input').val() != 0) {
                return 'Are you sure you want to leave?';
            }
        };
        var myChart = null;
        const semiFinal = () => {
            window.onbeforeunload = function(){}

            let result = []
            let valid = true;

            $('.custom-range').each(function() {
                if (+$(this).val() == 0) valid = false;
                result.push(+$(this).val())
            })

            if (valid) {
                if (myChart != null)
                    myChart.destroy();

                renderRes(result)
                pagesToggle()
                
            } else {
                swalFire("{{__('common.All fields are required')}}")
            }
        }
        const pagesToggle = () => {
            $('#semiFinal').fadeToggle()
            $('#toolPage').fadeToggle()
        }
        const renderRes = (res) => {
            var ctx = $('#myChart');
            myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: [
                        "{{ __('common.Health') }}",
                        "{{ __('common.Friends & Family') }}",
                        "{{ __('common.Fun, Leisure & Recreation') }}",
                        "{{ __('common.Wealth, Leisure & recreation') }}",
                        "{{ __('common.Relationship') }}",
                        "{{ __('common.Learning & Personal Growth') }}",
                        "{{ __('common.Spiritual') }}",
                        "{{ __('common.Career') }}",
                    ],
                    datasets: [{
                        data: res,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 203, 207)',
                            'rgb(54, 162, 235)',
                            '#5c1ac3',
                            '#ffe1e2',
                            '#e2a03f',
                        ]
                    }]
                    },
                options: {scales: {r: {max: 10}}}
            });
        }
    </script>
@endpush
