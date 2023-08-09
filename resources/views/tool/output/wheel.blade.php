@extends('layouts.master')
@push('css')
    <style>
        .component-card_1 {
            width: 30rem;
        }
    </style>
@endpush
@section('content')
    <div class="row ">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Wheel of Life'])
                </ol>
            </nav>
            <livewire:undo-btn tool="wheel" local="{{ explode('/', request()->path())[0] }}" />
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing ">
            <div class="row justify-content-center">
                {{--  --}}
                <div class="col-12">
                    <div class="card component-card_1">
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
        @php
            $wheel_res = implode('#', Session::get('output-wheel'));
        @endphp
        <input type="hidden" id="wheel-res" value="{{ $wheel_res }}">
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = $('#myChart');
        let result = $('#wheel-res').val().split('#')
        var myChart = new Chart(ctx, {
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
                    data: result,
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
            options: {
                scales: {
                    r: {
                        max: 10,
                        // display: false
                    }
                }
            }
        });
    </script>
@endpush
