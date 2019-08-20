@extends('layouts.mentor')

@section('content')
<!-- <div class="listpgWraper"> -->
  <div class="block less-top">
    <div class="container" style="margin-top: 20px;">@include('flash::message')
        <div class="row"> @include('includes.mentor_dashboard_menu')

          <div class="col-md-9 col-sm-8">
              <div class="myads">
                  <h3>{{__('Message Details')}}</h3>
                  <ul class="searchList">
                      <!-- job start -->
                      <li id="job_li">
                          <div class="row">
                              <div class="col-md-8 col-sm-8">
                                  <div class="container lighter" style="padding: 15px;">
                                  <div class="jobinfo">
                                      <h3><a title="{{$mentorMessage->user->name}}">{{ __('You :') }}</a></h3>
                                      <div class="companyName"><a>{{$mentorMessage->mentor->email}}</a></div>
                                  </div>
                                  <p><span style="font-weight: bold;">{{__('Message : ')}}</span>{{ $mentorMessage->recommendation->message }}</p>
                                  @if( isset($mentorMessage->recommendation->course_id) )
                                  <p><span style="font-weight: bold;">{{__('Skill Recommended : ')}}</span>{{ $mentorMessage->recommendation->course->title }}</p>
                                  <p><span style="font-weight: bold;text-align: justify">{{__('Description : ')}}</span>{{ $mentorMessage->recommendation->course->description }}</p>
                                  @endif
                                  </div>

                                  <div class="container darker"  style="padding: 15px;">
                                    <div class="jobinfo">
                                        <h3><a href="{{route('mentor.user-profile', $mentorMessage->user->id)}}" title="{{$mentorMessage->user->name}}">{{$mentorMessage->user->name}} :</a></h3>
                                        <div class="companyName"><a href="{{route('mentor.user-profile', $mentorMessage->user->id)}}">{{$mentorMessage->user->email}}</a></div>
                                    </div>
                                  <p>{{ $mentorMessage->message }}</p>
                                  <span class="time-right">{{ $mentorMessage->created_at->format('d  M, Y: H:i') }}</span>
                                  </div>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <!-- job end -->
                  </ul>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection

@push('styles')
<style>

.darker {
  border-color: #ccc;
  background-color: #ddd;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  width: 820px;
}
.lighter {
  border: 2px solid #dedede;
  background-color: #ffffff;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  width: 820px;
}
.time-right {
  float: right;
  color: #aaa;
  margin-top: 10px;
}
.time-left {
  float: left;
  color: #999;
  margin-top: 10px;
}
</style>
@endpush
