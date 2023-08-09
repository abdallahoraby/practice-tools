@extends('layouts.master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <style>
        .component-card_1 {
            width: auto;
        }

        .selected {
            background-color: #3b3f5c !important;
            border-color: #3b3f5c !important;
            box-shadow: 0 10px 20px -10px #3b3f5c !important;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
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
            <livewire:ncode-tool local="{{explode('/', request()->path())[0]}}" />
        </div>
    </div>
@endsection
