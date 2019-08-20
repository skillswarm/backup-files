@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }
</style>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="{{ route('admin.home') }}">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <a href="{{ route('list.users') }}">Candidates</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Add Multiple Candidates</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Multiple Candidates </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo"> <i class="icon-settings font-red-sunglo"></i> <span class="caption-subject bold uppercase">Import Candidates Form</span> </div>
                    </div>
                    <div class="portlet-body form">
                        <ul class="nav nav-tabs">
                            <li class="active"> <a href="#Details" data-toggle="tab" aria-expanded="false"> Details </a> </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="Details">
                              <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                                   @csrf
                                   <input type="file" name="file" class="form-control">
                                   <br>
                                   <button class="btn btn-success">Import Candidate Data</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection
