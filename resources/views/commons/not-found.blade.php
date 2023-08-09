@extends('layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <style>
        .component-card_1 {
            width: auto;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div class="row">
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h1>{{__('common.No Results Found')}}</h1>
                    <a href="{{URL::previous()}}" class="btn btn-info ml-2 btn-lg">{{__('common.Back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
