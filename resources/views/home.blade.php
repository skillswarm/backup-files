@extends('layouts.candidate')

@section('content')
  <div class="block less-top">
    <div class="container">
      <div class="row">
          <div class="col-sm-12">
            @if( $user->getCurrentProgress($user->id) > 0)
            <div class="progress">
              <div id="dynamic" data-progress="{{ $user->getCurrentProgress($user->id) }}" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                <span id="current-progress"></span>
              </div>
            </div>
            @endif
          </div>
      </div>
    </div>
    <div class="container" style="margin-top: 40px;">@include('flash::message')
        <div class="row"> @include('includes.user_dashboard_menu')
            <div class="col-md-9 col-sm-8"> @include('includes.user_dashboard_stats')
                @if((bool)config('jobseeker.is_jobseeker_package_active'))
                @php
                $packages = App\Package::where('package_for', 'like', 'job_seeker')->get();
                $package = Auth::user()->getPackage();
                if(null !== $package){
                $packages = App\Package::where('package_for', 'like', 'job_seeker')->where('id', '<>', $package->id)->where('package_price', '>=', $package->package_price)->get();
                }
                @endphp

                @if(null !== $package)
                @include('includes.user_package_msg')
                @include('includes.user_packages_upgrade')
                @else

                @if(null !== $packages)
                @include('includes.user_packages_new')
                @endif
                @endif
                @endif </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.progress {
  margin: 10px;
  width: 1170px;
  margin-left: 15px;
}
</style>
@endpush

@push('scripts')
<script>
function getCurrentProgress(){
    var current_progress = $("#dynamic").attr('data-progress');
    if (current_progress <= 100){
      $("#dynamic")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "% Complete");
    }
}
$(document).ready(function(){
  getCurrentProgress();
});
</script>
@endpush
