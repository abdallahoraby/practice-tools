<div class="row justify-content-center ">
    @foreach ($tools as $item)
        @if ($item['open'])
            <div class="col-md-4 mb-4">
                <div class="infobox-1 w-100">
                    <a href="../../{{explode('/', request()->path())[0]}}/start/{{$item['link']}}?token={{Request::input('token')}}">
                        <button class="btn w-100   {{$item['color']}} mb-2">{{__("common.{$item['title']}")}}</button>
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>