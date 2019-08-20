@extends('layouts.candidate')

@section('content')
  <div class="block less-top">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            @include('includes.user_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="userccount">
                            <div class="formpanel"> @include('flash::message')
                                <!-- Personal Information -->
                                @include('user.inc.profile')
                                @include('user.inc.summary')
                                @include('user.forms.cv.cvs')
                                @include('user.forms.project.projects')
                                @include('user.forms.experience.experience')
                                @include('user.forms.education.education')
                                @include('user.forms.skill.skills')
                                @include('user.forms.language.languages')
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

@push('scripts')
@include('includes.immediate_available_btn')
@endpush
