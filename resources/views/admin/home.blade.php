@extends('admin.layouts.admin_layout')
@section('content')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="background-color:#eef1f5;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li><span> Home </span><i class="fa fa-circle"></i> </li>
                <li><span> Admin Panel </span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Admin Panel </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                      <div class="visual"> <i class="fa fa-user"></i> </div>
                      <div class="details">
                          <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalActiveUsers }}</span> </div>
                          <div class="desc"> Active Candidates </div>
                      </div>
                  </a> </div>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                          <div class="visual"> <i class="fa fa-user"></i> </div>
                          <div class="details">
                              <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalVerifiedUsers }}</span> </div>
                              <div class="desc"> Verified Candidates </div>
                          </div>
                      </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual"> <i class="fa fa-user"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalActiveEmployers  }}</span> </div>
                            <div class="desc"> Active Emlpoyers </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual"> <i class="fa fa-list"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalVerifiedEmployers }}</span> </div>
                            <div class="desc"> Verified Employers </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual"> <i class="fa fa-list"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349"> {{ $newJobs }}</span> </div>
                            <div class="desc"> New Jobs </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual"> <i class="fa fa-list"></i> </div>
                        <div class="details">
                            <div class="number"> <span data-counter="counterup" data-value="1349">{{ $totalActiveJobs }}</span> </div>
                            <div class="desc"> Active Jobs </div>
                        </div>
                    </a> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-share font-dark hide"></i> <span class="caption-subject font-dark bold uppercase">Recently Registered Candidates</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="slimScrol">
                            <ul class="feeds">
                                @foreach($recentUsers as $recentUser)
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"><a href="{{ route('edit.user', $recentUser->id) }}" {{ $recentUser->is_seen === 0 ? 'style=color:red;':''}}> {{ $recentUser->name }} ({{ $recentUser->email }}) </a>  - <i class="fa fa-home" aria-hidden="true"></i> {{ $recentUser->getLocation()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right"> <a href="{{ route('list.users') }}">See All Users</a> <i class="icon-arrow-right"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-share font-dark hide"></i> <span class="caption-subject font-dark bold uppercase">Recent Jobs</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="slimScrol">
                            <ul class="feeds">
                                @foreach($recentJobs as $recentJob)
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"><a href="{{ route('edit.job', $recentJob->id) }}" {{ $recentJob->is_seen === 0 ? 'style=color:red;':''}}> {{ str_limit($recentJob->title, 50) }} </a>  - <i class="fa fa-list" aria-hidden="true"></i> {{ $recentJob->getCompany('name') }} - <i class="fa fa-home" aria-hidden="true"></i> {{ $recentJob->getLocation() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="scroller-footer">
                            <div class="btn-arrow-link pull-right"> <a href="{{ route('list.jobs') }}">See All Jobs</a> <i class="icon-arrow-right"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>New Registrations</b></h3>
      </div>
      <div class="modal-body">
        <p><b>New Jobs : <span id="new-job"></span></b></p>
        <p><b>New Employers :<span id="new-emp"></span></b></p>
        <p><b>New Users :<span id="new-user"></span></b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $( document ).ready(function() {
        $.ajax({
            type: "GET",
            url: '{{ route('admin.getNew') }}',
            success: function(data) {
              $("#new-job").text(data.newJobs);
              $("#new-emp").text(data.newEmployers);
              $("#new-user").text(data.newUsers);
            },
            error: function(data) { console.log(data); }
        });
        $("#myModal").modal("show");
    });
    $(function () {
        $('.slimScrol').slimScroll({
            height: '250px',
            railVisible: true,
            alwaysVisible: true
        });
    });
</script>
@endpush
