@extends('layouts.master')

@push('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('plugins/jquery-step/jquery.steps.css') }}" rel="stylesheet" type="text/css" />
    <style>
        #formValidate .wizard>.content {
            min-height: 25em;
        }

        #example-vertical.wizard>.content {
            min-height: 24.5em;
        }

        .component-card_1 {
            width: auto;
        }

        .summery {
            text-align: left
        }

        .question-box {
            background: white;
            padding: 1.5rem 1rem;
            margin-top: 9px;
            box-shadow: 4px 6px 10px -3px #bfc9d4;
            border-radius: 8px;
        }
        .question-box .title{
            /* color: white */
        }
        .max-h-100{
            max-height: 90px
        }
        #decision_2, #decision_3{
            display: block;
            margin: 0 35px;
        }
    </style>
    <style>
        .titleUp {
            text-align: left;
            padding: 6rem;
        }

        h6.title {
            font-weight: bold;
            margin-top: 30px;
        }
        .mb-4-rem{
            margin-bottom: 4rem;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->
@endpush
@section('content')
    <div class="row">
        {{-- breadcrumbs --}}
        <div class="page-header ml-3 w-100">
            <nav class="breadcrumb-two" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @include('inc.breadcrumb-item', ['tool' => 'Decision Making Wheel'])
                </ol>
            </nav>
        </div>
        {{-- breadcrumbs --}}
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing" id="finalPage">
            <div class="card component-card_1">
                <div class="card-body">
                    <div id="circle-basic" class="text-center">
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d1') }} </h4>
                            <textarea class="form-control decision_1 completed changable" data-answare="decision_1" cols="30" rows="10"></textarea>
                            {{-- <div class="text-left text-ar mt-4">
                                <button class="btn btn-info" onclick="endline(1)">{{__('common.new line')}}</button>
                            </div> --}}
                        </section>
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d2') }}</h4>
                            <h6>{{__('common.What are your available options to solve the problem? (you can add more than 1 option).')}}</h6>
                            <div class="d-flex">
                                <div class="add">
                                    <button class="btn btn-success mb-2" onclick="addItem()">+</button>
                                </div>
                            </div>
                            <div class="boxes">
                                <div class="row mb-2" id="item_1">
                                    <div class="col-8">
                                        <textarea class="form-control changable completed max-h-100" onchange="updateOptions(1)" rows="10"></textarea>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-danger" disabled>X</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d3') }} </h4>
                            <h6>{{__('common.What are the pros and cons (for each option) that affect you and people around you?')}}</h6>
                            <div id="optionsPC" class=" text-left text-ar"></div>
                        </section>
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d4') }} </h4>
                            <h6>{{__('common.What are the missing values that you will regain after applying these options?')}}</h6>
                            <textarea class="form-control decision_4 changable" data-answare="decision_4" cols="30" rows="10"></textarea>
                            {{-- <div class="text-left text-ar mt-4">
                                <button class="btn btn-info" onclick="endline(4)">{{__('common.new line')}}</button>
                            </div> --}}
                        </section>
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d5') }} </h4>
                            <h6>{{__('common.What are the emotions that you feel for this problem?  Will it decrease with the chosen options?')}}</h6>
                            <textarea class="form-control decision_5 changable" data-answare="decision_5" cols="30" rows="10"></textarea>
                            {{-- <div class="text-left text-ar mt-4">
                                <button class="btn btn-info" onclick="endline(5)">{{__('common.new line')}}</button>
                            </div> --}}
                        </section>
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d6') }} </h4>
                            <h6>{{__('common.What are the needed skills and information that you need to apply your options?')}}</h6>
                            <textarea class="form-control decision_6 changable" data-answare="decision_6" cols="30" rows="10"></textarea>
                            {{-- <div class="text-left text-ar mt-4">
                                <button class="btn btn-info" onclick="endline(6)">{{__('common.new line')}}</button>
                            </div> --}}
                        </section>
                        <h3></h3>
                        <section>
                            <h4>{{ __('common.d7') }} </h4>
                            <h6>{{__('common.Who are the people who can help you?')}}</h6>
                            <textarea class="form-control decision_7 changable" data-answare="decision_7" cols="30" rows="10"></textarea>
                            {{-- <div class="text-left text-ar mt-4">
                                <button class="btn btn-info" onclick="endline(7)">{{__('common.new line')}}</button>
                            </div> --}}
                        </section>
                        <h3></h3>
                        <section>
                            <div class="summery text-ar mb-5">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d1') }}
                                            </h6>
                                            <p id="decision_1"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d2') }}
                                            </h6>
                                            <ul id="decision_2"></ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d3') }}
                                            </h6>
                                            <ul id="decision_3"></ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d4') }}
                                            </h6>
                                            <p id="decision_4"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d5') }}
                                            </h6>
                                            <p id="decision_5"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d6') }}
                                            </h6>
                                            <p id="decision_6"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="question-box">
                                            <h6 class="title">
                                                {{ __('common.d7') }}
                                            </h6>
                                            <p id="decision_7"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>{{ __('common.what is your decision?') }}</h4>
                            <textarea class="form-control" cols="30" rows="10" id="decision"></textarea>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <livewire:decision-tool token="{{ Request::input('token') }}" local="{{ explode('/', request()->path())[0] }}" />
    </div>
@endsection
@push('js')
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script>
        $("#circle-basic").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            cssClass: 'circle wizard',
            onStepChanging: function (event, currentIndex, newIndex) { 

                if (newIndex < currentIndex) return true;
                let valid = true

                let n = 1
                let ol = (options.length == 0) ? 1 : options.length

                if (currentIndex == 1) n = 1 + ol
                else if (currentIndex == 2) n = 1 + (ol * 2)
                else if (currentIndex == 3) n = 2 + (ol * 2)
                else if (currentIndex == 4) n = 3 + (ol * 2)
                else if (currentIndex == 5) n = 4 + (ol * 2)
                else if (currentIndex == 6) n = 5 + (ol * 2)

                let i = 1;
                $('textarea').each(function(){
                    if ($(this).val() == "" && i <= n) {
                        swalFire("{{__('common.All fields are required')}}")
                        valid = false
                        return false
                    }

                    i++
                })

                return valid
             }
        });

        // $('[href="#next"]').hide();
        $('[href="#next"]').text("{{ __('common.next') }}")
        $('[href="#previous"]').text("{{ __('common.previous') }}")
        $('[href="#finish"]').text("{{ __('common.finish') }}")

        let counter = 1;
        let completed = 0;
        let options = []
        let optionsPC = []

        const addItem = () => {

            let option = $(`#item_${counter} textarea`).val()
            if (option == "") return swalFire("{{__('common.All fields are required')}}")

            counter++
            options.push("")
            $('.boxes').append(`
                <div class="row mb-2" id="item_${counter}">
                    <div class="col-8">
                        <textarea class="form-control max-h-100" onchange="updateOptions(${counter})" rows="10"></textarea>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-danger" onclick="removeitem(${counter})">X</button>
                    </div>
                </div>
            `)
        }

        const updateOptions = (index) => {
            
            let option = $(`#item_${index} textarea`).val()
            if (option == "") return swalFire("{{__('common.All fields are required')}}")

            options[index - 1] = option

            $('#decision_2').html(' ')
            $('#optionsPC').html(' ')

            options.forEach((elm, i) => {
                $('#decision_2').append(`<li>${elm}</li>`)
                $('#optionsPC').append(`
                    <h6 class="ml-3 mr-3">${elm}</h6>
                    <textarea class="form-control mt-2 max-h-100 pcs pc_${i}" onchange="updatePC(${i})" rows="10"></textarea>
                    <hr/>
                `)
            });
        }

        const updatePC = (index) => {
            let optionPC = $(`.pc_${index}`).val()
            if (optionPC == "") 
                return swalFire("{{__('common.All fields are required')}}")

            optionsPC[index] = optionPC;

            $('#decision_3').html(' ')
            completed = 0;

            optionsPC.forEach((elm, i) => {
                if ($(`.pc_${i}`).val() != "") completed++;

                $('#decision_3').append(`<li>${elm.replaceAll('\n', '/<br/>')}</li>`)
            });
            
            if (completed == counter) 
                $('[href="#next"]').show()
        }

        const removeitem = (id) => {
            counter--;
        
            let i = 1
            while(options[id - i] == undefined) i++;

            options.splice(id - i, 1)

            $('.boxes').html(`
                <div class="row mb-2" id="item_1">
                    <div class="col-8">
                        <textarea class="form-control changable completed max-h-100" onchange="updateOptions(1)" rows="10"></textarea>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-danger" disabled>X</button>
                    </div>
                </div>
            `)

            for (let i = 1; i < options.length; i++) {
                $('.boxes').append(`
                    <div class="row mb-2" id="item_${i + 1}">
                        <div class="col-8">
                            <textarea class="form-control max-h-100" onchange="updateOptions(${i + 1})" rows="10"></textarea>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-danger" onclick="removeitem(${i + 1})">X</button>
                        </div>
                    </div>
                `)
            }

            for (let i = 0; i < options.length; i++)
                $(`#item_${i + 1} textarea`).val(options[i])
            
            $('#decision_2').html(' ')
            $('#optionsPC').html(' ')
            optionsPC = []
            options.forEach((elm, i) => {
                $('#decision_2').append(`<li>${elm}</li>`)
                $('#optionsPC').append(`
                    <h6 class="ml-3 mr-3">${elm}</h6>
                    <textarea class="form-control mt-2 changable max-h-100 pcs pc_${i}" onchange="updatePC(${i})" rows="10"></textarea>
                    <hr/>
                `)
            });
        }

        const endline = (num) => {
            $(`.decision_${num}`).val($(`.decision_${num}.changable`).val() + '/' + "\n")
        }

        $('textarea.changable').on('change', function() {
            $(`#${$(this).attr('data-answare')}`).html($(this).val().replaceAll('\n', '/<br/>'))
        })

        $('[href="#finish"]').on('click', function() {
            if ($('#decision').val() == "") 
                return swalFire("{{__('common.All fields are required')}}")

            let res = [];

            for (let index = 1; index < 8; index++){
                if (index == 2) {
                    res.push(options.join('*'))

                } else if (index == 3) {
                    res.push(optionsPC.join('*'))

                } else {
                    res.push($(`#decision_${index}`).text())
                }
            }

            res.push($('#decision').val().replaceAll('\n', '/'))

            // toolOver(res)
            semiFinal(res)
        })
    </script>
@endpush
