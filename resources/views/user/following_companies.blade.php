@extends('layouts.candidate')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row">
            @include('includes.user_dashboard_menu')

            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('My Followings')}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($companies) && count($companies))
                        @foreach($companies as $company)
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg">{{$company->printCompanyImage()}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
                                        <div class="location">
                                            <label class="fulltime">{{$company->getLocation()}}</label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="{{route('company.detail', $company->slug)}}">{{__('View Details')}}</a></div>
                                </div>
                            </div>
                            <p>{{str_limit(strip_tags($company->description), 150, '...')}}</p>
                        </li>
                        <!-- job end -->
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
