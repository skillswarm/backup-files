@if($count > 100)
          <?php $i =0;
          if($count >= 500){
            $i = 5;
          }else if($count >= 400){
            $i = 4;
          }else if($count >= 300){
            $i = 3;
          }else if($count >= 200){
            $i = 2;
          }else if($count >= 100){
            $i = 1;
          }?>
<div class="panel panel-danger" style="width: 30%;">
  <div class="panel-heading">Ratings</div>
  <div class="panel-body">
    @for ($j = 0; $j < $i; $j++)
        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
    @endfor
  </div>
</div>
@endif

<ul class="row profilestat">
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
            <h6>{{Auth::user()->num_profile_views}}</h6>
            <strong>{{__('Profile Views')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-user" aria-hidden="true"></i>
            <h6><a href="{{route('my.followings')}}">{{Auth::user()->countFollowings()}}</a></h6>
            <strong>{{__('Followings')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-file" aria-hidden="true"></i>
            <h6><a href="{{url('my-profile#cvs')}}">{{Auth::user()->countProfileCvs()}}</a></h6>
            <strong>{{__('My CV List')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <h6><a href="{{route('my.messages')}}">{{Auth::user()->countApplicantMessages()}}</a></h6>
            <strong>{{__('Messages')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-briefcase" aria-hidden="true"></i>
            <h6><a href="{{route('my.job.applications')}}">{{Auth::user()->appliedJobs()->count()}}</a></h6>
            <strong>{{__('Applied Jobs')}}</strong> </div>
    </li>
</ul>
