<ul class="row profilestat">
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-user" aria-hidden="true"></i>
            <h6><a href="{{route('mentor.verified-profiles')}}">{{ $verified }}</a></h6>
            <strong>{{__('Verified Profiles')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-user" aria-hidden="true"></i>
            <h6><a href="{{route('mentor.assigned-profiles')}}">{{ $nonVerified }}</a></h6>
            <strong>{{__('Non Verified Profiles')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <h6><a href="{{route('mentor.my-messages')}}">{{ $messages }}</a></h6>
            <strong>{{__('Messages')}}</strong> </div>
    </li>
</ul>
