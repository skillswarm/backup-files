{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')

<h5>{{__('Course Details')}}</h5>
@if(isset($course))
{!! Form::model($course, array('method' => 'post', 'route' => array('skill-provider.updateSkillCourse', $course->id))) !!}
{!! Form::hidden('id', $course->id) !!}
@else
{!! Form::open(array('route' => 'skill-provider.storeSkillCourse','method' => 'post')) !!}
@endif
<div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'title') !!}">
          {!! Form::text('title', null, array('class'=>'form-control', 'id'=>'title', 'placeholder'=>__('Title'))) !!}
          {!! APFrmErrHelp::showErrors($errors, 'title') !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'description') !!}">
          {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Course Description'))) !!}
          {!! APFrmErrHelp::showErrors($errors, 'description') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'skills') !!}">
            <?php $skills = old('skills', $courseSkillIds); ?>
            {!! Form::select('skills[]', $Skills, $skills, array('class'=>'form-control select2-multiple', 'id'=>'skills', 'multiple'=>'multiple')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'skills') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'duration') !!}">
          {!! Form::text('duration', null, array('class'=>'form-control', 'id'=>'duration', 'placeholder'=>__('Course Duration'))) !!}
          {!! APFrmErrHelp::showErrors($errors, 'duration') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'fees') !!}">
          {!! Form::text('fees', null, array('class'=>'form-control', 'id'=>'fees', 'placeholder'=>__('Course Fee'))) !!}
          {!! APFrmErrHelp::showErrors($errors, 'fees') !!} </div>
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}" style="margin-left: 3%;">
        {!! Form::label('is_active', 'Active', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($course)) ? $course->is_active : 1)) == 0) {
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
    <div class="col-md-12">
        <div class="formrow">
            <button type="submit" class="btn">{{__('Update Profile and Save')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        </div>
    </div>

</div>
{!! Form::close() !!}

@push('scripts')
@include('includes.tinyMCEFront')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2-multiple').select2({
            placeholder: "{{__('Select Required Skills')}}",
            allowClear: true
        });
    });
</script>
@endpush
