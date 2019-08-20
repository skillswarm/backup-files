@extends('layouts.candidate')

@push('styles')
<style>
ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 0px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #747ab8;
    left: -10px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>
@endpush

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row"> @include('includes.user_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('My Timeline')}}</h3>

                       <div class="container mt-5 mb-5">
                      	<div class="row">
                      		<div class="col-md-6 offset-md-3">
                      			<ul class="timeline">
                              @if(isset($logs) && count($logs))
                                @foreach($logs as $log)
                                  <li>
                                    <a href="#">{{ $log->activity_type }}</a>
                                    <a href="#" class="float-right">{{$log->created_at->format('d  M Y, H:i')}}</a>
                                    <p>{{ $log->comment }}
                                        @if(isset($log->task_id))
                                          <p style="line-height: 0px;">{{__('Task Title : ')}}{{ $log->getTaskTitle($log->task_id) }}</p>
                                        @endif
                                        @if(isset($log->job_id))
                                          <p style="line-height: 0px;">{{__('Job Title : ')}}{{ $log->getJobTitle($log->job_id) }}</p>
                                        @endif
                                    </p>
                                  </li>
                                @endforeach
                              @endif
                      			</ul>
                      		</div>
                      	</div>
                      </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endpush
