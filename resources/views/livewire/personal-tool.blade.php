<div class="row w-100">
    @if ($semiOutput)
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
            <div class="card component-card_1">
                <div class="card-body text-center ">
                    @php
                        $res = Session::get('output-personal');
                        $name = config('resources.personal_naming')[$res - 1];
                    @endphp
                    <h5 class="info-heading">{{__('common.Your Personality is')}} {{__(("common.{$name}"))}}</h5>
                    <h2><a href="{{url("en/output/personalFraim{$res}")}}?token={{$token}}" target="_blank" class="text-info"> {{__(("common.View"))}} {{__(("common.{$name}"))}}</a></h2>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="text-center">
                <h5 class="info-heading mb-4 mt-2">{{__('common.Are you sure of the entered data?')}}</h5>
                <div class="d-flex justify-content-center">
                    <div>
                        <button onclick="previous()" class="btn btn-info ml-2 btn-lg">{{__('common.previous')}}</button> 
                        <button onclick="window.location.reload()" class="btn btn-info ml-2 btn-lg">{{__('common.Retry')}}  </button> 
                        <button onclick="toolOver({{$res}})" class="btn btn-info ml-2 btn-lg submit">{{__('common.finalSave')}} </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@push('js')
    <script>
        const toolOver = (res) => {
            @this.call('toolOver', res)
        }

        const semiFinal = (res) => {
            $('#finalPage').hide(0)
            @this.call('semiFinal', res)
        }

        const previous = () => {
            $('#finalPage').show(0)
            @this.call('previous')
        }
    </script>
@endpush
