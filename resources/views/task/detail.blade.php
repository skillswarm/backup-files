@extends('layouts.candidate')
@section('content')

@php
$company = $task->getCompany();
@endphp
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        @include('flash::message')
        <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
                <div class="row">
                    <div class="col-md-8">
                        <h2>{{$task->title}} - {{$company->name}}</h2>
                        <div class="ptext">{{__('Date Posted')}}: {{$task->created_at->format('M d, Y')}}</div>
                      {{--  @if(!(bool)$job->hide_salary)
                        <div class="salary">{{__('Monthly Salary')}}: <strong>{{$job->salary_from.' '.$job->salary_currency}} - {{$job->salary_to.' '.$job->salary_currency}}</strong></div>
                        @endif  --}}
                    </div>
                    <div class="col-md-4">
                        <div class="companyinfo">
                            <div class="companylogo"><a href="{{route('company.detail',$company->slug)}}">{{$company->printCompanyImage()}}</a></div>
                            <div class="title"><a href="{{route('company.detail',$company->slug)}}">{{$company->name}}</a></div>
                            <div class="ptext">{{$company->getLocation()}}</div>
                            <div class="opening">
                                <a href="{{route('company.detail',$company->slug)}}">
                                    {{App\Company::countNumJobs('company_id', $company->id)}} {{__('Current Jobs Openings')}}
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::guard('company')->check())
            <div class="jobButtons">
                @if($replyCount > 0)
                <a href="{{route('task.viewReply', [$task->id])}}" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('View Replies')}}</a>
                @else
                <a class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('No Reply')}}</a>
                @endif
            </div>
            @endif
        </div>

        <!-- Job Detail start -->
        <div class="row">
            <div class="col-md-12">
                <!-- Job Description start -->
                <div class="job-header">
                    <div class="jobinfo" style="color: #18a7ff;">
                        <h3>{{__('Problem Statement')}}</h3>
                        <p>{!! $task->description !!}</p>

                        <hr>
                        <h3>{{__('Skills Required')}}</h3>
                        <ul class="skillslist">
                            {!! $task->getTaskSkillsList() !!}
                        </ul>
                    </div>
                </div>
                <!-- Job Description end -->
            </div>
        </div>
        @if(Auth::guard('web')->check())
        <div class="row">
            <div class="col-md-12">
              <div class="job-header">
                  <div class="jobdetail">
                      <h3 id="contact_applicant">{{__('Reply')}}</h3>
                      <div id="alert_messages"></div>
                      <?php
                      if (Auth::guard('web')->check()) {
                          $from_id = Auth::guard('web')->user()->id;
                          $from_name = Auth::guard('web')->user()->name;
                          $from_email = Auth::guard('web')->user()->email;
                      }
                      $from_name = old('name', $from_name);
                      $from_email = old('email', $from_email);
                      $subject = old('subject');
                      $message = old('reply');
                      ?>
                      <form method="post" id="send-applicant-message-form">
                          {{ csrf_field() }}
                          <input type="hidden" name="task_id" value="{{ $task->id }}">
                          <input type="hidden" name="user_id" value="{{ $from_id }}">
                          <input type="hidden" name="user_name" value="{{ $from_name }}">
                          <div class="formpanel">
                              <div class="formrow">
                                  <input type="text" name="from_name" value="{{ $from_name }}" class="form-control" placeholder="{{__('Your Name')}}">
                              </div>
                              <div class="formrow">
                                  <input type="text" name="from_email" value="{{ $from_email }}" class="form-control" placeholder="{{__('Your Email')}}">
                              </div>
                              <div class="formrow">
                                  <input type="text" name="subject" value="{{ $subject }}" class="form-control" placeholder="{{__('Subject')}}">
                              </div>
                              <div class="formrow">
                                  <textarea name="message" class="form-control" placeholder="Message">{{ $message }}</textarea>
                              </div>
                              <div class="formrow">
                                  <input type="button" class="btn" value="{{__('Submit')}}" id="send_applicant_message">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@push('styles')
<style type="text/css">
    .view_more{display:none !important;}
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });

        $(document).on('click', '#send_applicant_message', function () {
        var postData = $('#send-applicant-message-form').serialize();
        $.ajax({
        type: 'POST',
                url: "{{ route('task.taskReply') }}",
                data: postData,
                //dataType: 'json',
                success: function (data)
                {
                response = JSON.parse(data);
                var res = response.success;
                if (res == 'success')
                {
                var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
                $('#alert_messages').html(errorString);
                $('#send-applicant-message-form').hide('slow');
                $(document).scrollTo('.alert', 2000);
                } else
                {
                var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                response = JSON.parse(data);
                $.each(response, function (index, value)
                {
                errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul></div>';
                $('#alert_messages').html(errorString);
                $(document).scrollTo('.alert', 2000);
                }
                },
        });
        });

    });
</script>
@endpush
