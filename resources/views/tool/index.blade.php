@extends('layouts.master')

@push('css')
       <!--  BEGIN CUSTOM STYLE FILE  -->
       <link href="{{asset('assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
       <style>
        .infobox-1{
            background: transparent
        }
        .layout-px-spacing{
            text-align: center
        }
       </style>
       <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
            <livewire:tool-index />
        </div>
    </div>
@endsection