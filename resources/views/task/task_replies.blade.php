@extends('layouts.employer')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row"> @include('includes.company_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('Title : ')}}{{$task->title}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($replies) && count($replies))
                        @foreach($replies as $reply)

                        @php
                        $style = (!(bool)$reply->is_seen)? 'border: 2px solid #FFB233;':'';
                        @endphp
                        <li style="{{$style}}">
                                <div class="row">
                                    <div class="col-md-8">
                                      <div class="jobinfo">
                                          <a href="{{route('task.replyDetails', $reply->id)}}" title="{{$reply->subject}}">
                                          <h4>{{$reply->user_name}} - {{ $reply->user_email }}</h4>
                                          </a>
                                          <div class="companyName">{{__('Subject : ')}}{!! $reply->subject !!}</div>
                                            <p class="location">{{str_limit(strip_tags($reply->reply), 150, '...')}}</p>
                                      </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        {{$reply->created_at->format('M d,Y')}}
                                    </div>
                                </div>
                        </li>
                        <!-- job end -->
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
