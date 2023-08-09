@extends('layouts.master')
@push('css')
    <link href="{{asset('assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/search.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
    <style>
        .infobox-3 {
            width: auto;
            background: white;
            position: relative;
        }
        .abs-top-right{
            position: absolute;
            top: 20px;
            right: 5px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12 layout-top-spacing layout-spacing">
            {{-- Search Box --}}
            <label class="abs-top-right switch s-icons s-outline s-outline-info mr-2 activationToggle">
                <input onchange="searchToggleActivation($(this).is(':checked'))" type="checkbox"  checked id="toggleBtn">
                <span class="slider"></span>
            </label>
            <div class="row justify-content-center mt-5 mb-3">
                <div id="searchLive" class="col-sm-8 col-12 ">
                    <div class="filtered-list-search m-0 mx-auto">
                        <form class="form-inline my-2 my-lg-0 justify-content-center">
                            <div class="w-100">
                                <input type="text" class="w-100 form-control product-search br-30" id="input-search">
                                <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Main Content --}}
            <livewire:admin.users-managment />
        </div>
    </div>
@endsection

@push('js')
    <script>
        // $('#input-search').on('keyup', function() {
        //     var rex = new RegExp($(this).val(), 'i');
        //     $('.users-container .user').hide();
        //     $('.users-container .user').filter(function() {
        //         return rex.test($(this).text());
        //     }).show();
        // });
    </script>
@endpush