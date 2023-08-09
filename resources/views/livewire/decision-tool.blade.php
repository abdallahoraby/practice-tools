<div class="row w-100 mb-4-rem">
    @if ($semiOutput)
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
            {{-- <div class="text-center">
                <button class="btn w-50 btn-info mt-4" onclick="printElement()">{{ __('common.Print') }}</button>
            </div> --}}
        </div>
        <div class="col-12">
            <div class="text-center">
                <h5 class="info-heading mb-4 mt-2">{{__('common.Are you sure of the entered data?')}}</h5>
                <div class="d-flex justify-content-center">
                    <div>
                        <button onclick="previous()" class="btn btn-info ml-2 btn-lg">{{__('common.previous')}}</button> 
                        <button onclick="window.location.reload()" class="btn btn-info ml-2 btn-lg">{{__('common.Retry')}}  </button> 
                        <button onclick="toolOver()" class="btn btn-info ml-2 btn-lg submit">{{__('common.finalSave')}} </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@push('js')
    <script>
        const toolOver = () => {
            @this.call('toolOver')
        }
        const semiFinal = (res) => {
            $('#finalPage').hide(0)
            @this.call('semiFinal', res)
        }
        const previous = () => {
            $('#finalPage').show(0)
            @this.call('previous')
        }
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