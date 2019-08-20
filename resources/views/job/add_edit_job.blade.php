@extends('layouts.employer')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="userccount">
                            <div class="formpanel"> @include('flash::message')
                                <!-- Personal Information -->
                                @include('job.inc.job')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush
