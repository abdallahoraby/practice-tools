@extends('layouts.master')
@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <style>
        .component-card_1 {
            width: auto;
        }

        .more {
            text-align: left
        }
        h5{
            cursor:auto !important;
        }
        .btn-outline-danger, .btn-outline-success{
            border: 1px solid transparent!important;
        }
        .hover-red:hover{
            color: #dc3545
        }
        .hover-success:hover{
            color: #28a745 
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
                    @include('inc.breadcrumb-item', ['tool' => 'N - Code'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h1>{{ __('common.N - Code') }}</h1>
                    <p class="p-4 ">
                        @if (explode('/', request()->path())[0] == 'en')
                            {{-- The image appears as a result of the image, <br> and a product is formed from a product resulting
                            from the form of symbols or symbols or appear in the image and we retreat from many things, <br>
                            symbols that make us feel empowered and give us the motivation and strength to move towards many 
                            things in our lives, <br> your understanding of this code in all its details in its transmission is 
                            great In your life, it stops you and makes you dread to step in. --}}

                            Each of us, over time, has some ideas and beliefs that are formulated in the form of symbols <br> or code that either negatively or positively affect our lives, moods, actions and relationships without <br> paying  attention to the basic root and true depth of these symbols, symbols  are divided into two types, <br> negative symbols that may make us panic and dread so we  give up on a lot of things, and positive<br> symbols that make us feel empowered and give us the motivation and strength to take action towards <br> many things in our lives. Through this tool, you will learn and recognize the symbols, codes, and beliefs <br> that move you towards empowerment or that prevent you and make you feel dread.

                            <hr>
                            <div class="more text-ar mb-4">
                                <h4 class="font-weight-bold mb-4">
                                    Codes Types
                                </h4>
                                {{-- <h6 class="font-weight-bold mb-4">
                                    N-code (NEGATIVE) & E-code (EMPOWERING)
                                </h6> --}}
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="hover-red">N-code</h5>
                                        <p>
                                            These code usually end up with an answer or statement that makes you feel dread.  <br>
                                            e.g: I never do anything right, everyone is always against me. <br>
                                            If you are coded this way you will feel dread.
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="hover-success">E-code</h6>
                                        <p>
                                            These code usually end up with an answer or statement that makes you feel empowered, <br>
                                            and gives you motivation and strength. <br>
                                            e.g: I am strong enough to always find a way. I never quit because I am a winner.
                                        </p>
                                    </div>
                                </div>
                                <h6 class="text-danger mt-5">So let’s find and eliminate your N-codes.</h6>
                            </div>
                        @else
                            كل منا مع مرور الوقت تتكون وتتشكل لديه بعض الأفكار والمعتقدات التي تصاغ على شكل رموز أو شفرة
                            تؤثر إما سلبا أو إيجابا على حياتنا ومزاجنا وأعمالنا وعلاقاتنا <br> دون أن ننتبه إلى الجذر الأساسي 
                            والعمق الحقيقي لهذه الرموز, وهي تنقسم إلى نوعين <br> ,رموز سلبية قد تجعلنا نشعر بالفزع ونتراجع عن
                            الكثير من الأمور, ورموز إيجابية تجعلنا نشعر بالتمكين وتمنحنا الدافع والقوة للإقدام نحو الكثير من <br>
                            الأمور في حياتنا, فهمك لهذه الشفرة بكل تفاصيلها سيحدث نقله كبيرة في حياتك, من خلال هذه الأداة <br>
                            ستتعلم وتتعرف على كمية الرموز والشفرات والمعتقدات التي تحركك نحو التمكين أو التي تمنعك وتشعرك
                            بالفزع عن الإقدام.

                            <hr>
                            <div class="more text-ar mb-4">
                                <h4 class="font-weight-bold mb-4">أنواع الرموز</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="hover-red">سلبى</h6>
                                        <p>
                                            عادةً ما تنتهي هذه الشفرة بإجابة أو عبارة تجعلك تشعر بالفزع.
                                            على سبيل المثال:<br> أنا لا أفعل أي شيء بشكل صحيح ،<br> الجميع دائمًا ضدي.
                                            إذا تم ترميزك بهذه الطريقة فسوف تشعر بالفزع
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="hover-success">تمكين</h6>
                                        <p>
                                            عادةً ما تنتهي هذه الشفرة بإجابة أو بيان يجعلك تشعر بالتمكين ،
                                            ويمنحك الدافع والقوة. <br>
                                            على سبيل المثال: أنا قوي بما يكفي لأجد دائمًا طريقة. لم أستسلم أبدًا لأنني فائز.
                                        </p>
                                    </div>
                                </div>
                                <h6 class="text-danger font-weight-bold mt-5">لذلك دعونا نعثر على الرموز السلبية و ازالتها..</h6>
                            </div>
                        @endif
                    </p>
                    <a href="../../{{ explode('/', request()->path())[0] }}/tool/ncode?token={{ Request::input('token') }}">
                        <button class="btn w-50 btn-info mb-2">
                            @if (explode('/', request()->path())[0] == 'en')
                                Start
                            @else
                                ابدأ
                            @endif
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
