@extends('layouts.master')
@push('css')
    <style>
        .component-card_1 {
            width: auto;
        }
    </style>
@endpush
@section('content')
    <!-- CONTENT AREA -->
    <div class="row">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => "Baseline"])
                </ol>
            </nav>
            <livewire:undo-btn tool="baseline" local="{{explode('/', request()->path())[0]}}"/>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h5 class="info-heading">{{__('common.Final Result')}}</h5>
                    <hr>
                    @foreach (Session::get('output-baseline') as $line)
                        @php
                            $line = explode('*', $line);
                            $word = $line[0];
                            $color = $line[1];
                        @endphp
                        <button class=" btn w-50 {{$color}} mb-4 mr-2 btn-lg word"> {{ __("common.{$word}") }} </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
@endsection
