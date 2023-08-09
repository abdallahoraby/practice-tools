@extends('layouts.master')
@push('css')
    <style>
        .component-card_1 {
            width: auto;
        }

        .titleUp {
            text-align: left;
            padding: 6rem;
        }

        h6.title {
            font-weight: bold;
            margin-top: 30px;
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
                    @include('inc.breadcrumb-item', ['tool' => 'Decision Making Wheel'])
                </ol>
            </nav>
            <livewire:undo-btn tool="decision" local="{{ explode('/', request()->path())[0] }}" />
        </div>
        {{-- breadcrumbs --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing ">
            <div class="card component-card_1" id="print">
                <div class="card-body text-center ">
                    <img src="https://www.awarenesspathways.com/wp-content/uploads/2022/05/Logo.jpg" alt="">
                    <div class="text-ar titleUp">
                        <h6 class="title">{{ __('common.My decision is') }}</h6>
                        @foreach (explode('/', Session::get('output-decision')[7]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.I will refer to') }}
                        </h6>
                        @foreach (explode('/', Session::get('output-decision')[6]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.I need to strengthen my skills in') }}
                        </h6>
                        @foreach (explode('/', Session::get('output-decision')[5]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.I need to reduce emotions of') }}
                        </h6>
                        @foreach (explode('/', Session::get('output-decision')[4]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.My values that will be applied are') }}
                        </h6>
                        @foreach (explode('/', Session::get('output-decision')[3]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.The consequences are') }}
                        </h6>
                        @foreach (explode('*', Session::get('output-decision')[2]) as $item)
                            @foreach (explode('/', $item) as $formatedItem)
                                <p class="ml-3 mr-3">{{ $formatedItem }}</p>
                            @endforeach
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.My options are') }}
                        </h6>
                        @foreach (explode('*', Session::get('output-decision')[1]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                        <hr>
                        <h6 class="title">
                            {{ __('common.my problem is') }}
                        </h6>
                        @foreach (explode('/', Session::get('output-decision')[0]) as $item)
                            <p class="ml-3 mr-3">{{ $item }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn w-50 btn-info mt-4" onclick="printElement()">{{ __('common.Print') }}</button>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
@endsection
@push('js')
    <script>
        function printElement() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endpush
