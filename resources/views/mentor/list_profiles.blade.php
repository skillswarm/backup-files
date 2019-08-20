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
                      @if(isset($users) && count($users))
                      @foreach($users as $user)
                      <li id="job_li_{{$user->id}}">
                          <div class="row">
                              <div class="col-md-8 col-sm-8">
                                @if(isset($user->image))
                                  <div class="jobimg" style="width: 145px;">
                                    {{ ImgUploader::print_image("user_images/$user->image", 100, 100) }}
                                  </div>
                                @endif
                                  <div class="jobinfo">
                                      <h3><a title="{{$user->name}}">{{$user->name}}</a></h3>
                                      <div class="companyName"><a>{{$user->email}}</a></div>
                                      <div class="location">
                                          <label class="fulltime">{{str_limit(strip_tags($user->street_address),55, '...')}}</label>
                                          - <span>{{$user->phone}} , {{$user->mobile_num}}</span>
                                      </div>
                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="col-md-4 col-sm-4">
                                  <!-- <div class="listbtn"><a href="{{route('list.favourite.applied.users', [$user->id])}}">{{__('List Short Listed Candidates')}}</a></div> -->
                                  <div class="listbtn"><a href="{{route('mentor.user-profile', [$user->id])}}">{{__('View Profile')}}</a></div>
                              </div>
                          </div>
                          <p>{{--str_limit(strip_tags($user->description), 150, '...')--}}</p>
                      </li>
                      <!-- job end -->

                      @endforeach
                      @else
                      <h5 style="margin: 6%;">{{__('No Profile Available !!!')}}</h5>
                      @endif
                  </ul>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
