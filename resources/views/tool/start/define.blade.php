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
                    @include('inc.breadcrumb-item', ['tool' => 'Define My Outcome'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h1 class="">{{ __('common.Define My Outcome') }}</h1>
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                        <div class="p-5 text-left">
                            <p>
                                Outcomes excite, motivate and inspire us to take action and push our limits. Traditional
                                goal
                                setting
                                doesn’t work but outcomes aligned with your baselines and coding work like magic!
                            </p>
                            <p class="font-weight-bold mt-5">
                                WHAT ARE OUTCOMES?
                            </p>
                            <p>
                                You now have understood baselines and integrated power coding and realize without these
                                being
                                clear
                                and aligned anything you try to achieve will be difficult. Once you have clarity of
                                baselines
                                and
                                integrated power coding our outcome become easy to achieve. Have you ever met someone who
                                has
                                less skills than you? Is not as smart as you ,yet seems to have their best luck working
                                always
                                in their
                                favor. Everything they touch just works. It’s so annoying. I bet you know why! Their
                                baselines
                                and coding
                                are in alignment with their dreams and actions.
                            </p>
                            <p class="mt-4">
                                An outcome is a focus point which change your life. Unlike goals, outcomes shape your
                                character
                                because they are set with your mental state of mind.
                            </p>
                            <p>
                                If you don’t know where you want to be, how will you ever get there? Besides knowing your
                                outcomes,
                                it’s also important to have measurable, real outcomes and not just randomly set vague goals.
                            </p>
                        </div>
                    @else
                        <div class="p-5 text-ar">
                            <p>
                                النتائج تحفزنا و تشجعنا وتلهمنا لاتخاذ إجراءات و مد حدودنا. تحديد الهدف التقليدي لا يعمل مثل
                                النتائج المتوافقة مع قيمك الأساسية والترميز, فهي تعمل كالسحر!
                            </p>
                            <p class="font-weight-bold mt-5">
                                ما هي النتائج؟
                            </p>
                            <p>
                                لقد فهمت الآن القيم الأساسية والمعتقدات وأدركت أن أي شيء تحاول تحقيقه بدون أن تكونا واضحتان
                                ومتناسقتان سيكون صعبًا. بمجرد حصولك على قيم أساسية و معتقدات واضحتان، يصبح من السهل تحقيق
                                نتائجك. هل سبق لك أن قابلت شخصًا لديه مهارات أقل منك؟ ليس ذكيًا مثلك, لكنه يحظى بأفضل حظ في
                                العمل دائمًا. هؤلاء الناس كل شيء يلمسونه يعمل تلقائيا. انه شيء مزعج جدا. أراهن أنك تعرف
                                لماذا! لأن قيمهم الأساسية و معتقداتهم متوافقين مع أحلامهم وأفعالهم.
                            </p>
                            <p class="mt-4">
                                النتيجة هي نقطة تركيز تغير حياتك. على عكس الأهداف ، فإن النتائج تشكل شخصيتك لأنها تتناسب مع
                                حالتك الذهنية.
                            </p>
                            <p>
                                إذا كنت لا تعرف أين تريد أن تكون ، فكيف ستصل إلى هناك؟ إلى جانب معرفة نتائجك ، من المهم
                                أيضًا أن يكون لديك نتائج حقيقية قابلة للقياس وليس مجرد وضع أهداف غامضة بشكل عشوائي.
                            </p>
                        </div>
                    @endif

                    <a href="../../{{ explode('/', request()->path())[0] }}/tool/define?token={{ Request::input('token') }}">
                        <button class="btn w-50 btn-info mb-2">{{__('common.Start')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
