@extends('layouts.candidate')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;"> @include('flash::message')
        <div class="row">
            @include('includes.user_dashboard_menu')

            <div class="col-md-9 col-sm-8">

                <div class="myads">
                    <h3>{{__('Posted Jobs')}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany() @endphp
                        @if(null !== $company)
                        <li id="job_li_{{$job->id}}">
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg">{{$company->printCompanyImage()}}</div>
                                    <div class="jobinfo">
                                        <h3><a title="{{$job->title}}">{{$job->title}}</a></h3>
                                        <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                        <div class="location">
                                            <label class="fulltime" title="{{$job->getJobShift('job_shift')}}">{{$job->getJobShift('job_shift')}}</label>
                                            - <span>{{$job->getCity('city')}}</span></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <p>{{$job->description}}</p>
                            {{--<p>{{str_limit(strip_tags($job->description), 150, '...')}}</p>--}}
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

@push('scripts')
<script type="text/javascript">
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

$("button").click(function(){
    var task_id = $(this).attr('data-id');
    var reply = $("#task_reply_"+task_id).val();

    $.ajax({
           type: "POST",
           url: "{{ route('task.taskReply') }}",
           data:{ task_id : task_id ,reply : reply } ,
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
           success: function(data)
           {
             console.log(data);
             $("#error_"+task_id).html(data.msg);
             $("#error_"+task_id).css('color','red');
             $("#error_"+task_id).fadeOut(1000);
           }
         });
});

</script>
@endpush
