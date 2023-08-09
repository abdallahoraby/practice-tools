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
                    @include('inc.breadcrumb-item', ['tool' => 'Wheel of Life'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h1 class="">{{ __('common.Wheel of Life') }}</h1>
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                        <div class="p-5 text-center">
                            <p>
                                The outcome of this tool is to find which areas of your life are strong at the moment and
                                which
                                ones
                                need serious work. <br> 
                                Make sure you are aware on where you stand in each area of your life at
                                the
                                current state. <br>
                                You will go through the sequence of steps which ultimately form a unique wheel of life
                                showing
                                indicators on your current state of life
                            </p>
{{-- 
                            <p class="font-weight-bold">
                                Example of questions to open your mind on how you want to scale each area.
                            </p>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Spiritual: Your connection with God
                                </p>
                                <ul>
                                    <li>
                                        How well are you connected to God?
                                    </li>
                                    <li>
                                        How well is your faith and serenity when things are not well?
                                    </li>
                                    <li>
                                        How many times do you feel gratitude to his grace?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Health: Your body health
                                </p>
                                <ul>
                                    <li>
                                        How well do you proceed with your daily activities, your energy flow?
                                    </li>
                                    <li>
                                        How much do you know about your health, do you do annual checkups?
                                    </li>
                                    <li>
                                        How is you diet? Do you take care of what kind of food or supplements your body
                                        needs?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Relationship: Your relationship with your spouse
                                </p>
                                <ul>
                                    <li>
                                        How well is your communication and respect to one another?
                                    </li>
                                    <li>
                                        How well do you both express love and gratitude to one another?
                                    </li>
                                    <li>
                                        How much fun and sharing do you have in your relationship?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Friends and Family: your close circle of society
                                </p>
                                <ul>
                                    <li>
                                        How much fun, support, comfortable and peace do you find around them?
                                    </li>
                                    <li>
                                        How much of the real you can be expressed without judging around them?
                                    </li>
                                    <li>
                                        Do they energize, motivate, and push you to become better or the opposite?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Career: Your work that provides financial support.
                                </p>
                                <ul>
                                    <li>
                                        Do you feel your work is part of who you really are, you feel passionate about?
                                    </li>
                                    <li>
                                        Does it help you grow- challenge your potentials?
                                    </li>
                                    <li>
                                        Do you have a good time working in this field, do you enjoy it?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Wealth: money- possessions –investments
                                </p>
                                <ul>
                                    <li>
                                        Do you feel abundant or scarce?
                                    </li>
                                    <li>
                                        Do you have the knowledge and mindset of wealth?
                                    </li>
                                    <li>
                                        How about people around you are they financially abundant?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Fun, leisure and recreation: The entertainment in your life.
                                </p>
                                <ul>
                                    <li>
                                        How much do you entertain yourself?
                                    </li>
                                    <li>
                                        What new fun activity do you explore every now and then?
                                    </li>
                                    <li>
                                        How well do you plan your fun, recreation moments?
                                    </li>
                                </ul>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    Learning and personal growth: your self-education – self development
                                </p>
                                <ul>
                                    <li>
                                        How much do you put time for you to sharpen your skills?
                                    </li>
                                    <li>
                                        How much focus do you put to develop better characteristics than you have now?
                                    </li>
                                    <li>
                                        How much do you spend money in self-educating?
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    @else
                        <div class="p-5 text-center">
                            <p>
                                هذه الأداة ستساعدك على تحديد مناطق القوة في حياتك في الوقت الحالي وتلك الأخرى التي تحتاج إلى الاهتمام و العمل عليها. تأكد من أنك على دراية بالمستوي الذي تقف فيه في كل منطقة من مناطق حياتك في الوضع الحالي.
                                <br>
                                سوف تمر عبر سلسلة من الخطوات البسيطة والميسرة التي تشكل في النهاية عجلة حياة فريدة تظهر مؤشرات عن حالتك الحالية.
                            </p>

                            {{-- <p class="font-weight-bold">
                                هذه أمثلة بسيطة من الأسئلة لفتح عقلك حول الكيفية التي تريد بها قياس كل مجال من مجالات حياتك :
                            </p>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    المجال الروحي: علاقتك بالله 
                                 </p>
                                <ul>
                                    <li>
                                        ما مدى ارتباطك بالله ويقينك به ورضاك عنه ؟
                                    </li>
                                    <li>
                                        ما مدى ارتباطك باهلل ويقينك به ورضاك عنه ؟
                                    </li>
                                    <li>
                                        ما مدى اتصالك بروحك وصفائك عندما ال تسير األمور على ما يرام؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    المجال الصحي: صحة جسمك
                                </p>
                                <ul>
                                    <li>
                                        كيف هي طاقتك ونشاطك خلال اليوم ؟ كيف هو نومك ؟ هل تلبي احتياج جسمك اليومي منه ؟ 
                                    </li>
                                    <li>
                                        ما مدى معرفتك بوضحك الصحي الحالي ، هل تقوم بإجراء فحوصات سنوية ؟
                                    </li>
                                    <li>
                                        كيف هو نظامك الغذائي ؟ هل تعتني بنوع الطعام أو المكملات التي يحتاجها جسمك؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    مجال العلاقات الخاصة  : علاقتك بشريكك 
                                 </p>
                                <ul>
                                    <li>
                                         ما مدى جودة تواصلك مع شريكك واحترامكم لبعضكم البعض؟
                                    </li>
                                    <li>
                                        ما مدى جودة تواصلك مع شريكك واحترامكم لبعضكم البعض؟
                                    </li>
                                    <li>
                                         ما مقدار المتعة والاهتمامات المشتركة التي تتمتع بها في علاقتك؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    مجال الأصدقاء والعائلة: دائرتك المقربة من المجتمع
                                </p>
                                <ul>
                                    <li>
                                        ما مقدار المتعة والدعم والراحة والسلام الذي تجده بينهم ؟
                                    </li>
                                    <li>
                                        ما مقدار المساحة والحرية الآمنة التي يمكنك التعبير بها دون الحكم عليك ؟
                                    </li>
                                    <li>
                                        ما مقدار الدعم والتحفيز الذي يقدم لك منهم لتصبح أفضل ؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    المجال المهني : عملك الذي يوفر الدعم المالي
                                </p>
                                <ul>
                                    <li>
                                        هل تشعر أن عملك يمثل حقيقتك ، هل تشعر بشغف تجاهه ؟
                                    </li>
                                    <li>
                                        هل يساعدك على النمو – وتشعر فيه بتفعيل مهاراتك مع القليل من التحدي ؟
                                    </li>
                                    <li>
                                        هل تقضي وقتًا مميزاً في العمل في هذا المجال ، هل تستمتع به ؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    المجال المالي: أموال - ممتلكات - استثمارات
                                </p>
                                <ul>
                                    <li>
                                        هل تشعر بالوفرة أم بالندرة في كل الموارد لديك ؟
                                    </li>
                                    <li>
                                        هل لديك المعرفة والمهارات في الاستثمار والتعامل مع المال بعقلية الأثرياء ؟
                                    </li>
                                    <li>
                                        هل الأشخاص المحيطين بك لديهم وفرة ماليه أم متعثرين بالديون ؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    المرح ووقت الفراغ والاستجمام: الترفيه في حياتك
                                </p>
                                <ul>
                                    <li>
                                        هل تشعر أنك تستحق الحصول على التسلية أم أنها مضيعه للوقت؟
                                    </li>
                                    <li>
                                        هل تمارس أنشطة جديدة باستمرار والتي تساعدك على الاكتشاف مع المتعة ؟
                                    </li>
                                    <li>
                                        هل تخطط لأوقات المرح والترفيه الخاصة بك أم تتركها للظروف والفرص ؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div>
                            <div class="ul-box">
                                <p class="font-weight-bold">
                                    للتعلم والنمو الشخصي: التعليم الذاتي - تطوير الذات
                                </p>
                                <ul>
                                    <li>
                                        ما مقدار الوقت الذي تخصصه لصقل مهاراتك وخبراتك ؟
                                    </li>
                                    <li>
                                        ما مدى التركيز الذي تضعه على تطوير خصائص أفضل مما لديك الآن؟
                                    </li>
                                    <li>
                                        كم تنفق المال في التعليم الذاتي؟
                                    </li>
                                </ul>
                                <p class="font-weight-bold text-danger mb-5">
                                    ملاحظة : كُن حقيقياً هذا ليس اختبار لك ، ولا  توجد اجابة صح أو خطأ 
                                </p>
                            </div> --}}
                        </div>
                    @endif

                    <a href="../../{{ explode('/', request()->path())[0] }}/tool/wheel?token={{ Request::input('token') }}">
                        <button class="btn w-50 btn-info mb-2">{{__('common.Start')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
