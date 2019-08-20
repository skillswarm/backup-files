@extends('layouts.mentor')

@section('content')
<!-- <div class="listpgWraper"> -->
  <div class="block less-top">
    <div class="container" style="margin-top: 20px;">@include('flash::message')
        <div class="row"> @include('includes.skill_provider_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                  <div class="userccount">
                      <div class="formpanel">

                        @if($courses->count())
                        <div class="paypackages">
                            <!---four-paln-->
                            <div class="four-plan">
                                <h3>{{__('Active Courses')}}</h3>
                                <div class="row"> @foreach($courses as $course)
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <ul class="boxes">
                                            <li class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></li>
                                            <li class="plan-name" title="{{$course->title}}">{{$course->title}}</li>
                                            <li>
                                                <div class="main-plan">
                                                    <div class="plan-price1-1">Rs</div>
                                                    <div class="plan-price1-2">{{$course->fees}}</div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </li>
                                            <li class="plan-pages">{{__('Course Fees')}} : {{$course->fees}}</li>
                                            <li class="plan-pages">{{__('Course Duration')}} : {{$course->duration}} {{--__('Days')--}}</li>
                                            <li class="order"><div class="clearfix" title="{{$course->description}}">More Details</div></li>
                                        </ul>
                                    </div>
                                    @endforeach </div>
                            </div>
                            <!---end four-paln-->
                        </div>
                        @endif

                      </div>
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection
