@extends('layouts.employer')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('Company Posted Problem Statements')}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($tasks) && count($tasks))
                        @foreach($tasks as $task)
                        @php $company = $task->company->name; @endphp
                        @if(null !== $company)
                        <li id="task_li_{{$task->id}}">
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg">{{$task->company->printCompanyImage()}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('task.taskDetails', [$task->id])}}" title="{{$task->title}}">{{$task->title}}</a></h3>
                                        <div class="companyName"><a href="{{route('company.detail', $task->company->slug)}}" title="{{$company}}">{{ $company }}</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="{{route('task.editTask', [$task->id])}}">{{__('Edit')}}</a></div>
                                    <div class="listbtn"><a href="javascript:;" onclick="deleteTask({{$task->id}});">{{__('Delete')}}</a></div>
                                    <div class="listbtn"><a href="{{route('task.viewReply', [$task->id])}}" >{{__('View Replies')}}</a></div>
                                </div>
                            </div>
                            <p>{{str_limit(strip_tags($task->description), 150, '...')}}</p>
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
    function deleteTask(id) {
    var msg = 'Are you sure?';
    if (confirm(msg)) {
    $.post("{{ route('task.deleteTask') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#task_li_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
</script>
@endpush
