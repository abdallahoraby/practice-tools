@extends('layouts.master')
@push('css')
    <style>
        .component-card_1 {
            width: 70rem;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div class="row ">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Define My Outcome'])
                </ol>
            </nav>
            <livewire:undo-btn tool="define" local="{{ explode('/', request()->path())[0] }}" />
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing ">
            <div class="row justify-content-center">
                {{--  --}}
                <div class="col-12">
                    <div class="card component-card_1">
                        <div class="card-body">
                            <h5 class="text-center">{{ __('common.Define My Outcome') }}</h5>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
        @php
            $define_res = implode('#', Session::get('output-define'));
        @endphp
        <input type="hidden" id="define-res" value="{{ $define_res }}">
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = $('#myChart');
        let allRes = $('#define-res').val().split('/')
        let result = allRes[0].split('#')
        let labels = allRes[1].split('#')

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
        var myChart = new Chart(ctx, {
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
    </script>
@endpush
