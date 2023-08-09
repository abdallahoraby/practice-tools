@extends('layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .component-card_1 {
            width: 80%;
        }
    </style>
    <link href="{{asset('assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    {{-- breadcrumbs --}}
    <div class="page-header ml-3">
        <nav class="breadcrumb-two" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/index')}}?token={{Request::input('token')}}">Users</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Admin</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0);">Roles Managment</a></li>
            </ol>
        </nav>
    </div>
    {{-- breadcrumbs --}}
    <div class="row">
        <livewire:admin.users-roles :user_id="$user_id" />
    </div>
@endsection