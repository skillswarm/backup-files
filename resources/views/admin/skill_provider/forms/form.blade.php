{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
@if(isset($skill_provider))
{!! Form::model($skill_provider, array('method' => 'put', 'route' => array('update.skill-provider', $skill_provider->id), 'class' => 'form', 'files'=>true)) !!}
{!! Form::hidden('id', $skill_provider->id) !!}
@else
{!! Form::open(array('method' => 'post', 'route' => 'store.skill-provider', 'class' => 'form', 'files'=>true)) !!}
@endif
<div class="form-body">
    <input type="hidden" name="front_or_admin" value="admin" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'image') !!}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="{{ asset('/') }}admin_assets/no-image.png" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select Profile Image </span> <span class="fileinput-exists"> Change </span> {!! Form::file('image', null, array('id'=>'image')) !!} </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                </div>
                {!! APFrmErrHelp::showErrors($errors, 'image') !!} </div>
        </div>
        @if(isset($skill_provider))
        <div class="col-md-6">
            {{ ImgUploader::print_image("skill_provider_images/$skill_provider->logo") }}
        </div>
        @endif
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'name') !!}">
        {!! Form::label('name', 'Name', ['class' => 'bold']) !!}
        {!! Form::text('name', null, array('class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'name') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'email') !!}">
        {!! Form::label('email', 'Email', ['class' => 'bold']) !!}
        {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'email') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'password') !!}">
        {!! Form::label('password', 'Password', ['class' => 'bold']) !!}
        {!! Form::password('password',array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Password')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'password') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'ownership_type') !!}">
        {!! Form::label('ownership_type', 'Ownership Type', ['class' => 'bold']) !!}
        {!! Form::select('ownership_type_id', ['' => 'Select Ownership type']+$ownershipTypes, null, array('class'=>'form-control', 'id'=>'ownership_type_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'description') !!}">
        {!! Form::label('description', 'Employer details', ['class' => 'bold']) !!}
        {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>'Employer details')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'description') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'website') !!}">
        {!! Form::label('website', 'Website', ['class' => 'bold']) !!}
        {!! Form::text('website', null, array('class'=>'form-control', 'id'=>'website', 'placeholder'=>'Website')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'website') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'location') !!}">
        {!! Form::label('location', 'Location', ['class' => 'bold']) !!}
        {!! Form::text('location', null, array('class'=>'form-control', 'id'=>'location', 'placeholder'=>'Location')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'location') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'established_in') !!}">
        {!! Form::label('established_in', 'Established in', ['class' => 'bold']) !!}
        {!! Form::select('established_in', ['' => 'Select Established In']+MiscHelper::getEstablishedIn(), null, array('class'=>'form-control', 'id'=>'established_in')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'established_in') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'fax') !!}">
        {!! Form::label('fax', 'Fax #', ['class' => 'bold']) !!}
        {!! Form::text('fax', null, array('class'=>'form-control', 'id'=>'fax', 'placeholder'=>'Fax #')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'fax') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'phone') !!}">
        {!! Form::label('phone', 'Phone #', ['class' => 'bold']) !!}
        {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone #')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'phone') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
        {!! Form::label('country_id', 'Country', ['class' => 'bold']) !!}
        {!! Form::select('country_id', [''=>'Select Country']+$countries, 101, array('class'=>'form-control', 'id'=>'country_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'country_id') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
        {!! Form::label('state_id', 'State', ['class' => 'bold']) !!}
        <span id="default_state_dd">
            {!! Form::select('state_id', [''=>'Select State'], null, array('class'=>'form-control', 'id'=>'state_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'state_id') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
        {!! Form::label('city_id', 'City', ['class' => 'bold']) !!}
        <span id="default_city_dd">
            {!! Form::select('city_id', [''=>'Select City'], null, array('class'=>'form-control', 'id'=>'city_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
    </div>

    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Active', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($skill_provider)) ? $skill_provider->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                Active </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                In-Active </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'verified') !!}">
        {!! Form::label('verified', 'Verified', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $verified_1 = 'checked="checked"';
            $verified_2 = '';
            if (old('verified', ((isset($skill_provider)) ? $skill_provider->verified : 1)) == 0) {
                $verified_1 = '';
                $verified_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="verified" name="verified" type="radio" value="1" {{$verified_1}}>
                Verified </label>
            <label class="radio-inline">
                <input id="not_verified" name="verified" type="radio" value="0" {{$verified_2}}>
                Not Verified </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'verified') !!}
    </div>
    {!! Form::button('Update Personal Information <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
</div>
{!! Form::close() !!}
@push('css')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
@include('admin.shared.tinyMCEFront')
<script type="text/javascript">
    $(document).ready(function () {
        initdatepicker();
        $('#salary_currency').typeahead({
            source: function (query, process) {
                return $.get("{{ route('typeahead.currency_codes') }}", {query: query}, function (data) {
                    console.log(data);
                    data = $.parseJSON(data);
                    return process(data);
                });
            }
        });

        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($skill_provider)) ? $skill_provider->state_id : 0); ?>);
    });
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterDefaultCities(<?php echo old('city_id', (isset($skill_provider)) ? $skill_provider->city_id : 0); ?>);
                    });
        }
    }
    function filterDefaultCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
    function initdatepicker() {
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'yyyy-m-d'
        });
    }
</script>
@endpush
