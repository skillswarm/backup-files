@extends('layouts.mentor')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row">@include('includes.skill_provider_dashboard_menu')
            <div class="col-md-9 col-sm-8">


                      <div class="myads">
                        <h3>{{__('Course List')}}</h3>
                        <ul class="searchList">

                          @if(isset($courses) && count($courses))
                          @foreach($courses as $course)
                          <li id="task_li_{{$course ->id}}">
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg"></div>
                                    <div class="jobinfo">
                                        <h3><a title="{{$course ->title}}">{{$course ->title}}</a></h3>
                                        <div class="companyName"><a href="" title=""></a></div>
                                    </div>
                                    <div class="clearfix"><p style="text-align: justify;">{!! $course->description !!}</p></div>
                                    <div class="companyName" style="margin-left: 2%;font-weight: 600;color: #00a8ff;">{{__('Duration : ')}}{{$course->duration}}</div>
                                    <div class="companyName" style="margin-left: 2%;font-weight: 600;color: #00a8ff;">{{__('Fees  : Rs ')}}{{$course->fees}}</div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="{{route('skill-provider.editSkillCourse', [$course ->id])}}">{{__('Edit')}}</a></div>
                                    <div class="listbtn"><a href="javascript:;" onclick="deleteCourse({{$course ->id}});">{{__('Delete')}}</a></div>
                                </div>
                            </div>
                          </li>
                          @endforeach
                          @else
                          <h5 style="margin: 6%;">{{__('No Courses Available !!!')}}</h5>
                          @endif

                        </ul>
                      </div>
              <?php echo $courses->links(); ?>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    function deleteCourse(id) {
      var msg = 'Are you sure?';
      if (confirm(msg)) {
      $.post("{{ route('skill-provider.deleteSkillCourse') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
              .done(function (response) {
              if (response == 'ok')
              {
              $('#task_li_' + id).remove();
              } else
              {
              console.log(response);alert(response);
              alert('Request Failed!');
              }
              });
      }
    }
</script>
@endpush
