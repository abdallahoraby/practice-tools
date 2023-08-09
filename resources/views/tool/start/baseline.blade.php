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
    <div class="row tool-main-wrapper">.
        {{-- breadcrumbs --}}
        <div class="page-header col-2 ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Baseline'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-10 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    <h1>{{ __('common.Baseline') }}</h1>
                    @if (explode('/', request()->path())[0] == 'en')
                    <div class="p-4 text-left mb-3 ">
                        <h6>
                            <strong>What are the values? And what is its benefit? Why do we need to learn and discover it?</strong>
                        </h6>
                        <br>
                        <p>
                            Values are like the inner DNA that shapes our lives and moves our thoughts, feelings and behavior, it is the main engine and motivator of everything that appears from us or what feelings we hide inside us or thoughts and is translated by words and actions. Values help us know what makes us happy, what makes us angry, and why we sometimes feel good and feel bad at other times. Our discovery of the most important values that drive our lives is the biggest discovery of the meaning of the life we live, and it differs from one person to another according to interests, the environment, internal and external influences.
                        </p>
                        <p>
                            <strong>These values are fixed to some extent, unless this person is exposed to a strong shock or a dramatic event that changes his view of the world such as cases of separation, severe illness or loss. Once you discover your core values, you will be able to evaluate and interpret all the events around you. In this tool, we will identify the six core and most important values in your life</strong>
                        </p>
                        <br>
                        <span class="text-danger font-weight-bold">So let's explore your six core values, your unique DNA.</span>
                    </div>
                    @else
                    <div class="p-4 text-ar mb-3">
                        <h6>
                            <strong>ما هي القيم ؟ وما هي فائدتها ؟  ولماذا نحتاج تعلمها واكتشافها؟</strong>
                        </h6>
                        <br>
                        <p>
                            القيم هي بمثابة الحمض النووي الداخلي الذي يصيغ حياتنا ويحرك أفكارنا ومشاعرنا وسلوكنا و هي المحرك والباعث الرئيسي لكل ما يظهر منا أو ما نكتمه في داخلنا من مشاعر أو أفكار وتترجمه الأقوال والأفعال, القيم تفيدنا في معرفة ما هي الأمور التي تسعدنا وما هي الأمور التي تغضبنا ولماذا نشعر بالرضا  في بعض الأحيان و نشعر بالسوء أحيان أخري .اكتشافنا لأهم القيم المحركة لحياتنا هو بمثابة الاكتشاف الأكبر ل معنى الحياة التي نعيشها وهي تختلف من شخص إلى آخر بحسب الاهتمامات والبيئة والمؤثرات الداخلية والخارجية.
                        </p>
                        <p>
                            <strong>القيم هذه ثابتة إلى حد ما, ما لم يتعرض هذا الإنسان إلى صدمة قوية أو حدث دراماتيكي يغير نظرته للعالم مثل حالات الانفصال أو المرض الشديد أو الفقد . فور اكتشافك لقيمك الرئيسية سوف تستطيع تقييم وتفسير كل الأحداث من حولك وفي هذه الأداة سنقوم بتحديد الستة قيم الأساسية والأكثر أهمية في حياتك</strong>
                        </p>
                        <br>
                        <span class="text-danger font-weight-bold">لذلك دعونا نستكشف القيم الأساسية الستة الخاصة بك ، الحمض النووي الفريد الخاص بك..</span>
                    </div>
                    @endif
                    <a
                        href="../../{{ explode('/', request()->path())[0] }}/tool/baseline?token={{ Request::input('token') }}">
                        <button class="btn w-50 btn-info mb-2">{{__('common.Start')}}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
