@if (base64_decode(Request::input('token')) == "webmaster@awarenesspathways.com")
    <li class="breadcrumb-item"><a href="../../../{{explode('/', request()->path())[0]}}/admin/index?token={{Request::input('token')}}">Home</a></li>
@else
    @if (explode('/', request()->path())[1] == 'output')
        <li class="breadcrumb-item  practices"><a href="../../{{explode('/', request()->path())[0]}}/tool/index?token={{Request::input('token')}}">{{__('common.Practices')}}</a></li>
    @else
        <li class="breadcrumb-item  practices"><a href="../../{{explode('/', request()->path())[0]}}/tool/index?token={{Request::input('token')}}">{{__('common.Practices')}}</a></li>
    @endif
    <li class="breadcrumb-item sub-item {{ $tool === "N - Code" ? "active" : "" }}" aria-current="page"> N - Code </li>
    <li class="breadcrumb-item sub-item {{ $tool === "Personal Assesment" ? "active" : "" }}" aria-current="page"> Personality Test </li>
        <li class="breadcrumb-item sub-item {{ $tool === "Wheel of Life" ? "active" : "" }}" aria-current="page"> Wheel of Life </li>
    <li class="breadcrumb-item sub-item {{ $tool === "Baseline" ? "active" : "" }}" aria-current="page"> Baseline </li>
    <li class="breadcrumb-item sub-item {{ $tool === "Define My Outcome" ? "active" : "" }}" aria-current="page"> Define My Outcome </li>
    <li class="breadcrumb-item sub-item {{ $tool === "Decision Making Wheel" ? "active" : "" }}" aria-current="page"> Decision Making ladder </li>
@endif


