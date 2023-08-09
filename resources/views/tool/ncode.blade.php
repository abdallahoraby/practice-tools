@extends('layouts.master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <style>
        .component-card_1 {
            width: 100%;
        }

        .selected {
            background-color: #3b3f5c !important;
            border-color: #3b3f5c !important;
            box-shadow: 0 10px 20px -10px #3b3f5c !important;
        }

        .floating {
            position: fixed;
            margin-top: 28px;
            background: white;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            color: black;
            z-index: 99;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@push('vue')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
@section('content')
    <div class="row">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'N - Code'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1" id="app">
                <ncode-component token="{{ request()->token }}" local="{{ $local }}"
                    ncode-api="{{ url('getResources', 'ncode') }}" lang-api="{{ url("{$local}/getLang", 'ncode') }}"
                    opned-api="{{ url('opnedNcode', request()->token) }}"
                    save-api="{{ url('api/ncode') }}" />
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script>
        window.onbeforeunload = function(){
            if ($('.selected').length != 0 || $('#previousBtn').length != 0) {
                return 'Are you sure you want to leave?';
            }
        };
    </script>
@endpush
