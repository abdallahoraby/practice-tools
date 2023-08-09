<div class="">
    <a class="btn btn-info " href="../../{{explode('/', request()->path())[0]}}/tool/index?token={{Request::input('token')}}">{{__('common.Back to main menu')}}</a>
    {{-- <a class="btn btn-info " onclick="window.location.reload()">{{__('common.Back')}}</a> --}}
</div>