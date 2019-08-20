@extends('layouts.candidate')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;"> @include('flash::message')
        <div class="row">
            @include('includes.user_dashboard_menu')

            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('Posted Tasks')}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($tasks) && count($tasks))
                        @foreach($tasks as $task)
                        @php $company = $task->company->name;$slug = $task->company->slug; @endphp
                        @if(null !== $company)

                            @php
                            $style = (!(bool)$task->nofitications->is_seen)? 'border: 2px solid #FFB233;':'';
                            @endphp

                        <li id="task_li_{{$task->id}}" style="{{$style}}">
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg">{{$task->company->printCompanyImage()}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('taskDetails', [$task->id])}}" title="{{$task->title}}">{{$task->title}}</a></h3>
                                        <div class="companyName"><a href="{{route('company.detail', $slug)}}" title="{{$company}}">{{ $company }}</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <p>{{str_limit(strip_tags($task->description), 150, '...')}}</p><br>
                        </li>
                        <!-- job end -->
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
