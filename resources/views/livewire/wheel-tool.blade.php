<div>
    {{-- Be like water. --}}
</div>
@push('js')
    <script>
        $('.submit').on('click', function() {
            window.onbeforeunload = function(){}

            let result = []
            let valid = true;

            $('.custom-range').each(function() {
                if (+$(this).val() == 0) valid = false;
                result.push(+$(this).val())
            })
            
            if (valid) {
                @this.call('save', result)
            } else {
                swalFire("{{__('common.All fields are required')}}")
            }
        })
    </script>
@endpush
