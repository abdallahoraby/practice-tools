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
    <div class="row">.
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Decision Making Wheel'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h1>{{__('common.Decision Making Wheel')}}</h1>
                    <h5 class="p-4 ">
                        @if (explode('/', request()->path())[0] == 'en')
                        Many of us hesitate when making some <strong>fateful decisions</strong> when faced with a specific problem, <br> and from here we designed this tool for you to help you reach the optimal decision with clarity and ease, <br> which leaves you with a <strong>feeling of safety, stability and reassurance </strong> to move forward towards <br> this decision through the six facts that you will answer at each level in the decision ladder.
                        @else
                        الكثير منا يتردد عند اتخاذه بعض <strong>القرارات المصيرية</strong> عندما تواجهه مشكلة معينة <br> ومن هنا صممنا لك هذه الأداة التي تساعدك على الوصول إلى القرار الأمثل بكل وضوح ويسر وسهولة<br> والذي يترك لك <strong>شعور الأمان والاستقرار والاطمئنان</strong> للمضي قدما نحو هذا القرار <br> من خلال المعطيات الستة التي ستجيب عليها عند كل درجة في سلم القرار.
                        @endif
                    </h5>
                    <a href="../../{{ explode('/', request()->path())[0] }}/tool/decision?token={{ Request::input('token') }}">
                        <button class="btn w-50 btn-info mb-2">{{__('common.Start')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
