<div class="card component-card_1">
    <div class="card-body text-center ">
        <div class="d-flex justify-content-between">
            {{--  --}}
            <div class="">
                @if ($currentPhase != 0)
                    <button onclick="prevPhase()" class="btn btn-info ml-2 btn-lg">{{__('common.previous')}}</button>
                @endif
            </div>
            {{--  --}}
            <div class="d-flex">
                <h2>
                    <span id="picked">{{ $picked }}</span>
                    /
                    <span id="maxPicked">
                        @if ($maxPicked == 162)
                            ∞
                        @else
                            {{ $maxPicked }}
                        @endif
                    </span>
                </h2>
                @if ($maxPicked == 6)
                    <button id="submit" wire:click="toolOver" class="btn btn-info ml-2 btn-lg">{{__('common.finish')}}</button>
                @else
                    <button onclick="nextPhase()" class="btn btn-info ml-2 btn-lg">{{__('common.next')}}</button>
                @endif
            </div>
            {{--  --}}
        </div>
        @if ($maxPicked == 162)
            <h6 class="text-right mt-4">{{__('common.Minimum')}} 24</h6>
        @endif
        <div class="row">
            @foreach ($selectedWords as $catIndex => $item)
                <div class="col-12">
                    <h6 class="arfont">{{ __("ncode.{$item['category_title']}") }}</h6>
                    <hr>
                    <div class="row">
                        @foreach ($item['category_data'] as $wordIndex => $word)
                            <div class="col-md-6" wire:ignore>
                                <button class="{{ $item['category_color'] }} arfont w-100 btn mb-4 mr-2 btn-lg word"
                                    onclick='selectItem($(this), {{ $catIndex }}, "{{ $word }}")'>
                                    {{ explode('.', __("ncode.{$word}"))[1] }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('js')
    <script>
        const prevPhase = () => {
            basicBlock()
            $('.btn.word.selected').each(function () {
                $(this).removeClass('selected')
            })
            @this.call('prevPhase')
            .then((res) => $.unblockUI())
        }

        const selectItem = (object, catIndex, word) => {

            let maxPicked = Number($('#maxPicked').text());
            maxPicked = (!maxPicked) ? 244 : maxPicked;
            let picked = Number($('#picked').text());

            if (!$(object).hasClass('selected') && picked == maxPicked) return alert('❌❌❌')

            $(object).toggleClass('selected')
            basicBlock()
            @this.call('select', catIndex, word)
            .then((res) => $.unblockUI())
        }
        const nextPhase = () => {
            let maxPicked = Number($('#maxPicked').text());
            maxPicked = (!maxPicked) ? 244 : maxPicked;
            let picked = Number($('#picked').text());

            if (picked >= 24 || picked == maxPicked) {
                $('.word').each(function() {
                    $(this).removeClass('selected')
                })
                @this.call('nextPhase')
            } else {
                alert('Can\'t do this, Complete Selection')
            }
        }
    </script>
@endpush
