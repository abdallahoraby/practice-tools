@extends('layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <style>
        .component-card_1 {
            width: auto;
        }
    </style>
    <link href="assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    {{-- breadcrumbs --}}
    <div class="page-header ml-3">
        <nav class="breadcrumb-two" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Practices</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">BaseLine</a></li>
            </ol>
        </nav>
    </div>
    {{-- breadcrumbs --}}
    <div class="row">
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                </div>
            </div>
        </div>
    </div>
@endsection
