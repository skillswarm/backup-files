<ul class="row profilestat">
  @if(isset($courses) && count($courses))
  @foreach($courses as $course)
    <li class="col-md-3 col-sm-4 col-xs-6">
        <div class="inbox"><i class="fa fa-paper-plane" aria-hidden="true"></i>
            <h5><a href="">{{$course->title}}</a></h5>
            <h5>{{$course->duration}}</h5>
            <h5>Rs:{{$course->fees}}</h5>
        </div>
    </li>
  @endforeach
  @else
  <h5 style="margin: 6%;">{{__('No Courses Available !!!')}}</h5>
  @endif
    {{-- <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-briefcase" aria-hidden="true"></i>
            <h6><a href=""></a></h6>
            <strong>{{__('My Candidates')}}</strong> </div>
    </li>
    <li class="col-md-2 col-sm-4 col-xs-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <h6><a href=""></a></h6>
            <strong>{{__('Messages')}}</strong> </div>
    </li> --}}
</ul>
