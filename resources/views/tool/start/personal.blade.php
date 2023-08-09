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
                    @include('inc.breadcrumb-item', ['tool' => 'Personal Assesment'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center">
                    <h1 class="text-center ">{{ __('common.Personal Assesment') }}</h1>
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                        <div class="p-5 text-center">
                            <h6>
                                The outcome of this tool is for you to be aware of who you really are, what kind of
                                personality
                                traits you
                                have, and how can you use this information to drive your life to produce better results &
                                achieve
                                success.
                            </h6>
                            <h6>
                                Answer the questions by choosing 4 cards then 2 then 1 to find what personality you present.
                            </p>
                        </div>
                    @else
                        <div class="p-5 text-center">
                            <h6>
                                تتمثل نتيجة هذه الأداة في أن تكون على دراية بمن أنت حقًا ، ونوع السمات الشخصية التي لديك
                                وكيف يمكنك استخدام
                                هذه المعلومات لدفع حياتك لتحقيق نتائج أفضل وتحقيق النجاح.
                            </h6>
                            <h6>
                                أجب عن الاسئلة باختيار 4 بطاقات ثم 2 ثم 1 لمعرفة الشخصية التي تمثلها.
                            </h6>
                        </div>
                    @endif

                    <a href="../../{{ explode('/', request()->path())[0] }}/tool/personal?token={{ Request::input('token') }}">
                        <button class="btn w-50 btn-info mb-2">{{ __('common.Start') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
