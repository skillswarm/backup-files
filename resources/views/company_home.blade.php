@extends('layouts.employer')

@section('content')
<div class="block less-top" style="margin-top: 20px;">
    <div class="container">@include('flash::message')
        <div class="row"> @include('includes.company_dashboard_menu')
            <div class="col-md-9 col-sm-8"> @include('includes.company_dashboard_stats')
        <?php
        if((bool)config('company.is_company_package_active')){
        $packages = App\Package::where('package_for', 'like', 'employer')->get();
        $package = Auth::guard('company')->user()->getPackage();
        if(null !== $package){
        $packages = App\Package::where('package_for', 'like', 'employer')->where('id', '<>', $package->id)->where('package_price', '>=', $package->package_price)->get();
        } }
        ?>
        </div>
        </div>
    </div>
</div>
@endsection
