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
                    @include('inc.breadcrumb-item', ['tool' => 'Personal Assesment'])
                </ol>
            </nav>
            <livewire:undo-btn tool="personal" local="{{explode('/', request()->path())[0]}}"/>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    @php
                        $res = Session::get('output-personal');
                        $name = config('resources.personal_naming')[$res - 1];
                    @endphp
                    <h5 class="info-heading">{{__('common.Your Personality is')}} {{__(("common.{$name}"))}}</h5>
                    <h2><a href="{{url("en/output/personalFraim{$res}")}}?token={{Request::input('token')}}" target="_blank" class="text-info"> {{__(("common.View"))}} {{__(("common.{$name}"))}}</a></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
@endsection
