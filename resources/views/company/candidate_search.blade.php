@extends('layouts.employer')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('Candidate Search')}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($users) && count($users))
                        @foreach($users as $user)
                        <li>
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div class="jobimg">{{$user->printUserImage(100, 100)}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a></h3>
                                        <div class="location"> {{$user->getLocation()}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="listbtn"><a href="{{route('user.profile', $user->id)}}">{{__('View Profile')}}</a></div>
                                </div>
                            </div>
                            <p>{{str_limit($user->getProfileSummary('summary'),150,'...')}}</p>
                        </li>
                        <!-- job end -->
                        @endforeach
                        @else
                        <h5 style="margin: 6%;">{{__('No Candidates Found !!!')}}</h5>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
