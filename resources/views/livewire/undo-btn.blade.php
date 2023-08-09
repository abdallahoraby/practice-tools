<div>
    @if (base64_decode(Request::input('token')) != "webmaster@awarenesspathways.com")
    <a class="btn btn-info mr-4" href="../../{{explode('/', request()->path())[0]}}/tool/index?token={{Request::input('token')}}">{{__('common.Back to main menu')}}</a>
    {{-- <button onclick="undo()" class="btn btn-info mr-4">{{__('common.Retry')}}</button> --}}
    {{-- <button onclick="undo()" class="btn btn-info mr-4">{{__('common.Undo')}}</button> --}}
    @endif
</div>
@push('js')
    <script>
        const undo = () =>{
            swal({
                    title: "{{ __('common.Are you sure ?') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "{{__('common.Ok')}}",
                    cancelButtonText: "{{__('common.Cancel')}}",
                    padding: '2em'
                }).then(function(result) {
                if (result.value) {
                    basicBlock()
                    @this.call('undo')
                }
            })
        }
    </script>
@endpush