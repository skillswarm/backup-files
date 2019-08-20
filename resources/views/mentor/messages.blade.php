@extends('layouts.mentor')

@section('content')
<!-- <div class="listpgWraper"> -->
  <div class="block less-top">
    <div class="container" style="margin-top: 20px;">@include('flash::message')
        <div class="row"> @include('includes.mentor_dashboard_menu')

          <div class="col-md-9 col-sm-8">
              <div class="myads">
                  <h3>{{__('Profiles')}}</h3>
                  <ul class="searchList">
                      <!-- job start -->
                      @if(isset($messages) && count($messages))
                      @foreach($messages as $message)
                      <li id="job_li_{{$message->id}}">
                          <div class="row">
                              <div class="col-md-8 col-sm-8">
                                @if(isset($message->user->image))
                                <?php $image = $message->user->image ?>
                                  <div class="jobimg" style="width: 145px;">
                                    {{ ImgUploader::print_image("user_images/$image", 100, 100) }}
                                  </div>
                                @endif
                                  <div class="jobinfo">
                                      <h3><a title="{{$message->user->name}}">{{$message->user->name}}</a></h3>
                                      <div class="companyName"><a>{{$message->user->email}}</a></div>
                                      <div class="location">
                                          <label class="fulltime">{{str_limit(strip_tags($message->user->street_address),55, '...')}}</label>
                                          - <span>{{$message->user->phone}} , {{$message->user->mobile_num}}</span>
                                      </div>
                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="col-md-4 col-sm-4">
                                  <div class="listbtn"><a href="{{route('mentor.messages-detail', [$message->id])}}">{{__('More Details >>')}}</a></div>
                              </div>
                          </div>
                          <p style="text-align: justify;">{!! $message->message !!}</p>
                      </li>
                      <!-- job end -->

                      @endforeach
                      @else
                      <h5 style="margin: 6%;">{{__('No Messages Available !!!')}}</h5>
                      @endif
                  </ul>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
