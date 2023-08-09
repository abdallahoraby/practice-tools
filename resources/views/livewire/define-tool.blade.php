<div class="table-responsive">
    <table class="table table-bordered mb-4">
        {{-- <thead>
            <tr>
                <th>target</th>
                <th>Your expected rating</th>
                <th>time (advance)</th>
                <th>time (continuity)</th>
                <th>Difficulty rate</th>
                <th>enjoyment rate</th>
                <th>the influence (90 days)</th>
                <th>the influence (25 years)</th>
                <th><a href="javascript:void(0);" class="text-success"><i
                            data-feather="edit" onclick="addNewItem()"></i></a></th>
            </tr>
        </thead> --}}
        <tbody wire:ignore.self>
            @for ($i = 1; $i <= 3; $i++)
            <tr>
                <td>{{$i}}</td>
                <td class="cell-1"><input type="text" class="form-control ppText form-control-lg"></td>
                <td class=" cell-2"><input onchange="totalChanged($(this), true)" type="text" class="form-control form-control-sm"></td>
                <td class="changable cell-3"><input onchange="totalChanged($(this))" type="text" class="form-control form-control-sm"></td>
                <td class="changable cell-4"><input onchange="totalChanged($(this))" type="text" class="form-control form-control-sm"></td>
                <td class="changable cell-5"><input onchange="totalChanged($(this))" type="text" class="form-control form-control-sm"></td>
                <td class="changable cell-6"><input onchange="totalChanged($(this))" type="text" class="form-control form-control-sm"></td>
                <td class="changable cell-7"><input onchange="totalChanged($(this))" type="text" class="form-control form-control-sm"></td>
                <td class="changable cell-8"><input onchange="totalChanged($(this))" type="text" class="form-control form-control-sm"></td>
                <td class="total cell-0"><input type="text" disabled class="form-control form-control-sm" value="0"></td>
            </tr>
            @endfor
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{-- <button class="btn btn-danger" onclick="window.location.reload()">{{__('common.Retry')}}</button> --}}
        <button onclick="semiFinal()" class="btn btn-info btn-lg  submit">{{__('common.finish')}}</button>
    </div>
</div>
@push('js')
    <script>
        window.onbeforeunload = function(){
            return $('input').each(function(){
                if ($(this).val() != "") {
                    return 'Are you sure you want to leave?';
                }
            })
        };

        const addNewItem = () => {
            @this.call('increment')
        }
        const removeItem = () => {
            @this.call('decrement')
        }
        const save = () => {

            let valid = true;
            $('input').each(function(){
                if ($(this).val() == "") {
                    $(this).addClass('is-invalid')
                    valid = false
                }
            })

            if (!valid) 
                return swalFire("{{__('common.Error At least one row must be filled')}}")

            let result = [];
            let ppResult = [];

            $('.total input').each(function(){
                if ($(this).val() != 0)
                    result.push(+$(this).val())
            })
            if (result.length == 0) {
                $('input').each(function(){
                    if ($(this).val() == "")
                        $(this).addClass('is-invalid')
                })
                return swalFire("{{__('common.Error At least one row must be filled')}}")
            }
         
            $('.ppText').each(function(){
            if ($(this).val())
                ppResult.push($(this).val())
            })
            window.onbeforeunload = function(){}

            @this.call('save', result, ppResult)
        }
        const totalChanged = (object, notMaximum = false) => {
            let val = Number($(object).val());
            let regExp = /^0/;
            // console.log(regExp.test(val));
            let maximun = (notMaximum) ? 9999 : 5
            const rules = (!(regExp.test($(object).val())) && Number.isInteger(val) && val <= maximun && val >= 1 )
            if (!rules) {
                $(object).val('')
                $(object).addClass('is-invalid')
                return swalFire("{{__('common.The value must be between 1 and 5')}}")
            }

            let newVal = val;

            if (notMaximum) return ;
            
            $(object).parent().siblings('.changable').each(function() {
                inputVal = Number($(this).find('input').val());
                newVal += inputVal;
            })

            let total = $(object).parent().siblings('.total').find('input')
            total.val(newVal)
        }
    </script>
@endpush