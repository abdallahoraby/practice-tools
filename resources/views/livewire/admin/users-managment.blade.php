<div class="row users-container">
    @foreach ($users as $item)
        <div class="col-md-4 mb-4 user user_{{$item->ID}} @if (!$item->pt_activate) user-notactive @endif" wire:ignore>
            <div class="infobox-3">
                <h5 class="info-heading">{{$item->user_nicename}}</h5>
                <label class="abs-top-right switch s-icons s-outline s-outline-success mr-2">
                    <input onchange="toggleActivation($(this).is(':checked'), {{$item->ID}})" type="checkbox" @if ($item->pt_activate) checked @endif>
                    <span class="slider round"></span>
                </label>
                <p class="info-text">Email : {{$item->user_email}}</p>
                <a href="{{url('admin/users-roles', $item->ID)}}?token={{Request::input('token')}}" class="btn btn-success ">Roles & Permissions</a>
                <button class="btn btn-outline-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Results</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('output/ncode', $item->ID)}}?token={{Request::input('token')}}">
                        <i data-feather="bookmark"></i> N Code
                    </a>
                    <a class="dropdown-item" href="{{url('output/personal', $item->ID)}}?token={{Request::input('token')}}">
                        <i data-feather="bookmark"></i> Personal Assesment
                    </a>
                    <a class="dropdown-item" href="{{url('output/decision', $item->ID)}}?token={{Request::input('token')}}">
                        <i data-feather="bookmark"></i> Decision Making Wheel
                    </a>
                    <a class="dropdown-item" href="{{url('output/wheel', $item->ID)}}?token={{Request::input('token')}}">
                        <i data-feather="image"></i> Wheel of Life
                    </a>
                    <a class="dropdown-item" href="{{url('output/baseline', $item->ID)}}?token={{Request::input('token')}}">
                        <i data-feather="bookmark"></i> BaseLine
                    </a>
                    <a class="dropdown-item" href="{{url('output/define', $item->ID)}}?token={{Request::input('token')}}">
                        <i data-feather="bookmark"></i> Define My Outcome
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@push('js')
    <script>
        $('.users-container .user-notactive').hide();

        const toggleActivation = (val, user_id) => {
            basicBlock()
            @this.call('toggleActivation', val, user_id)
            .then((res) => {
                $.unblockUI()
                $(`.users-container .user_${user_id}`).hide()
            })
        }
        $('#input-search').on('keyup', function() {
            var rex = new RegExp($(this).val(), 'i');
            $('.users-container .user').hide();
            $('.users-container .user').filter(function() {
                return rex.test($(this).text());
            }).show();
        });
        const searchToggleActivation = (val) => {

            $('.users-container .user').hide();
            $('.users-container .user').filter(function() {
                return (val) 
                    ? $(this).find('input').is(":checked") 
                    : !$(this).find('input').is(":checked")

            }).show();
        }
    </script>
@endpush