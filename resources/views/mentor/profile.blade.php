@extends('layouts.mentor')

@section('content')
<!-- <div class="listpgWraper"> -->
  <div class="block less-top">
    <div class="container" style="margin-top: 20px;">@include('flash::message')
        <div class="row"> @include('includes.mentor_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                  <div class="userccount">
                      <div class="formpanel"> @include('flash::message')
                          @include('mentor.inc.profile')
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
