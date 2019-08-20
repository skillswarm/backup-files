<h5>{{__('Problem Statement Details')}}</h5>
@if(isset($task))
{!! Form::model($task, array('method' => 'put', 'route' => array('task.updateTask', $task->id), 'class' => 'form')) !!}
{!! Form::hidden('id', $task->id) !!}
@else
{!! Form::open(array('method' => 'post', 'route' => array('task.storeTask'), 'class' => 'form')) !!}
@endif
<div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'title') !!}"> {!! Form::text('title', null, array('class'=>'form-control', 'id'=>'title', 'placeholder'=>__('Title'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'title') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'description') !!}"> {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Task description'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'description') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'skills') !!}">
            <?php
            $skills = old('skills', $taskSkillIds);
            ?>
            {!! Form::select('skills[]', $taskSkills, $skills, array('class'=>'form-control select2-multiple', 'id'=>'skills', 'multiple'=>'multiple')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'skills') !!} </div>
    </div>
    <div class="col-md-12">
        <div class="formrow">
            <button type="submit" class="btn">{{__('Update Task')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
<input type="file" name="image" id="image" style="display:none;" accept="image/*"/>
{!! Form::close() !!}
<hr>
@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
@include('includes.tinyMCEFront')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2-multiple').select2({
            placeholder: "{{__('Select Required Skills')}}",
            allowClear: true
        });
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'yyyy-m-d'
        });
    });
</script>
@endpush
