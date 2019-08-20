@extends('layouts.mentor')
@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
    @include('flash::message')
        <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <!-- Candidate Info -->
                        <div class="candidateinfo">
                            <div class="userPic">{{$user->printUserImage()}}</div>
                            <div class="title">
                                {{$user->getName()}}
                            </div>
                            <div class="desi">{{$user->getLocation()}}</div>
                            <div class="loctext"><i class="fa fa-history" aria-hidden="true"></i> {{__('Member Since')}}, {{$user->created_at->format('M d, Y')}}</div>
                            <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->street_address}}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <!-- Candidate Contact -->
                        <div class="candidateinfo">
                            @if(!empty($user->phone))
                            <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$user->phone}}">{{$user->phone}}</a></div>
                            @endif
                            @if(!empty($user->mobile_num))
                            <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$user->mobile_num}}">{{$user->mobile_num}}</a></div>
                            @endif
                            @if(!empty($user->email))
                            <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
             <div class="jobButtons">
               @if(isset($profileCv->cv_file))
                <a href="{{asset('cvs/'.$profileCv->cv_file)}}" class="btn"><i class="fa fa-download" aria-hidden="true"></i> {{__('Download CV')}}</a>
                <!-- <a href="#contact_applicant" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Send Message')}}</a> -->
               @endif
            </div>
        </div>

        <!-- Job Detail start -->
        <div class="row">
            <div class="col-md-8">
                <!-- About Employee start -->
                <div class="job-header">
                    <div class="jobinfo" style="color: #18a7ff;">
                        <h3>{{__('About me')}}</h3>
                        <p>{{$user->getProfileSummary('summary')}}</p>
                    </div>
                </div>

                <!-- Education start -->
                <div class="job-header">
                    <div class="jobinfo" style="color: #18a7ff;">
                        <h3>{{__('Education')}}</h3>
                        <div class="" id="education_div"></div>
                    </div>
                </div>

                <!-- Experience start -->
                <div class="job-header">
                    <div class="jobinfo" style="color: #18a7ff;">
                        <h3>{{__('Experience')}}</h3>
                        <div class="" id="experience_div"></div>
                    </div>
                </div>

                <!-- Portfolio start -->
                <div class="job-header">
                    <div class="jobinfo" style="color: #18a7ff;">
                        <h3>{{__('Portfolio')}}</h3>
                        <div class="" id="projects_div"></div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <!-- Candidate Detail start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Candidate Detail')}}</h3>
                        <ul class="jbdetail">

                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Age')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getAge()}} Years</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Gender')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getGender('gender')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Marital Status')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getMaritalStatus('marital_status')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Experience')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getJobExperience('job_experience')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Career Level')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getCareerLevel('career_level')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Current Salary')}}</div>
                                <div class="col-md-6 col-xs-6"><span class="permanent">{{$user->current_salary}} {{$user->salary_currency}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Expected Salary')}}</div>
                                <div class="col-md-6 col-xs-6"><span class="freelance">{{$user->expected_salary}} {{$user->salary_currency}}</span></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Google Map start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Skills')}}</h3>
                        <div id="skill_div"></div>
                    </div>
                </div>

                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Languages')}}</h3>
                        <div id="language_div"></div>
                    </div>
                </div>
                <!-- Contact Company start -->
                <!-- <div class="job-header">
                    <div class="jobdetail">
                        <h3 id="contact_applicant">{{--__($form_title)--}}</h3>
                        <div id="alert_messages"></div>
                        <?php
                        $from_name = $from_email = $from_phone = $subject = $message = $from_id = '';
                        if (isset($company)) {
                            $from_name = $company->name;
                            $from_email = $company->email;
                            $from_phone = $company->phone;
                            $from_id = $company->id;
                        }
                        if (Auth::guard('company')->check()) {
                            $from_name = Auth::guard('company')->user()->name;
                            $from_email = Auth::guard('company')->user()->email;
                            $from_phone = Auth::guard('company')->user()->phone;
                            $from_id = Auth::guard('company')->user()->id;
                        }
                        $from_name = old('name', $from_name);
                        $from_email = old('email', $from_email);
                        $from_phone = old('phone', $from_phone);
                        $subject = old('subject');
                        $message = old('message');
                        ?>
                        <form method="post" id="send-applicant-message-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="to_id" value="{{ $user->id }}">
                            <input type="hidden" name="from_id" value="{{ $from_id }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="user_name" value="{{ $user->getName() }}">
                            <div class="formpanel">
                                <div class="formrow">
                                    <input type="text" name="from_name" value="{{ $from_name }}" class="form-control" placeholder="{{__('Your Name')}}">
                                </div>
                                <div class="formrow">
                                    <input type="text" name="from_email" value="{{ $from_email }}" class="form-control" placeholder="{{__('Your Email')}}">
                                </div>
                                <div class="formrow">
                                    <input type="text" name="from_phone" value="{{ $from_phone }}" class="form-control" placeholder="{{__('Phone')}}">
                                </div>
                                <div class="formrow">
                                    <input type="text" name="subject" value="{{ $subject }}" class="form-control" placeholder="{{__('Subject')}}">
                                </div>
                                <div class="formrow">
                                    <textarea name="message" class="form-control" placeholder="Message">{{ $message }}</textarea>
                                </div>
                                <div class="formrow">
                                    <input type="button" class="btn" value="{{__('Submit')}}" id="send_applicant_message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3 id="contact_applicant">Recommendations</h3>
                        <div id="success_msg"></div>
                        <div id="message-error"></div>
                        <div id="course_id-error"></div>
                        <form method="post" id="send-recommendation-form" action="{{ route('mentor.submit-recommendation', [$user->id]) }}">
                            {{ csrf_field() }}
                            <div class="formpanel">
                                <div class="formrow">
                                    <textarea name="message" class="form-control" placeholder="Message" type="text" style="margin-bottom: 20px;">{{ (isset($recommendation->message)) ? $recommendation->message : '' }} </textarea>
                                </div>
                                <div class="formrow">
                                  @if(isset($courses))
                                    <select class="form-control" name="course_id" class="form-control">
                                    <option value="">Select a skill</option>
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}" {{ (isset($recommendation->course_id)) && ($recommendation->course_id=== $course->id) ? "selected='selected'" : "" }}>{{$course->title}}</option>
                                    @endforeach
                                    </select>
                                  @else
                                  @endif
                                </div>
                                <div class="formrow">
                                    <input type="button" class="btn" value="{{__('Submit')}}" id="send_applicant_recommendation" onClick="submitRecommendation();">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="job-header">
                    <div class="jobdetail">
                      <h3>{{__('Verification Status')}}</h3>
                            <div class="formpanel" style="font-size: large;">
                                <div class="formrow">
                                  <div class="form-check">
                                      <input id="checkbox1" type="checkbox" class="form-check-input" onClick="changeToProgress({{$user->id}});" {{ $user->verified === 1||$user->verified === 2 ? "checked='checked'" : "" }}>
                                      <label for="checkbox1" style="margin-left:20px"> {{__('Background Check in Progress')}}  </label>
                                  </div>
                                  <div class="form-check">
                                      <input id="checkbox2" type="checkbox" class="form-check-input" onClick="changeToVerified({{$user->id}});" {{ $user->verified === 2 ? "checked='checked'" : "" }}>
                                      <label for="checkbox2" style="margin-left:20px"> {{__('Verified Profile')}} </label>
                                  </div>
                                </div>
                            </div>
                    </div>
                </div>
                  <!-- <a href="{{route('mentor.assigned-profiles')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a> -->
            </div>
        </div>
    </div>
</div>

@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">

    function submitRecommendation() {
        var form = $('#send-recommendation-form');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (json) { console.log(json);
                $("#success_msg").html("<span class='text text-success'>{{__('Recommendation submitted')}}</span>");
                $("#success_msg").fadeOut(1000);
            },
            error: function (json) { console.log(json);
                if (json.status === 422) {
                    var resJSON = json.responseJSON;
                    $.each(resJSON.errors, function (key, value) {
                      $("#"+ key + "-error").html('');
                      $("#"+ key + "-error").html('<strong>' + value + '</strong>');
                      $("#"+ key + "-error").css('color','red');
                      $("#"+ key + "-error").fadeOut(1000);
                    });
                } else {
                    // Error
                    // Incorrect credentials
                    // alert('Incorrect credentials. Please try again.')
                }
            }
        });
    }

    function changeToProgress(id) {
        $.post("{{ route('mentor.to-progress') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) { console.log(response);
                    if (response == 'ok')
                    {
                        alert('Status Updated');
                        location.reload(true);
                    } else
                    {
                        alert('Request Failed!');
                        location.reload(true);
                    }
                });
    }

    function changeToVerified(id) {
        $.post("{{ route('mentor.to-verified') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) { console.log(response);
                    if (response == 'ok')
                    {
                        alert('Status Updated');
                        location.reload(true);
                    } else
                    {
                        alert('Request Failed!');
                        location.reload(true);
                    }
                });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
    $(document).on('click', '#send_applicant_message', function () {
    var postData = $('#send-applicant-message-form').serialize();
    $.ajax({
    type: 'POST',
            url: "{{ route('contact.applicant.message.send') }}",
            data: postData,
            //dataType: 'json',
            success: function (data)
            {
            response = JSON.parse(data);
            var res = response.success;
            if (res == 'success')
            {
            var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
            $('#alert_messages').html(errorString);
            $('#send-applicant-message-form').hide('slow');
            $(document).scrollTo('.alert', 2000);
            } else
            {
            var errorString = '<div class="alert alert-danger" role="alert"><ul>';
            response = JSON.parse(data);
            $.each(response, function (index, value)
            {
            errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul></div>';
            $('#alert_messages').html(errorString);
            $(document).scrollTo('.alert', 2000);
            }
            },
    });
    });
    showEducation();
    showProjects();
    showExperience();
    showSkills();
    showLanguages();
    });
    function showProjects()
    {
    $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#projects_div').html(response);
            });
    }
    function showExperience()
    {
    $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#experience_div').html(response);
            });
    }
    function showEducation()
    {
    $.post("{{ route('show.applicant.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#education_div').html(response);
            });
    }
    function showLanguages()
    {
    $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#language_div').html(response);
            });
    }
    function showSkills()
    {
    $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#skill_div').html(response);
            });
    }
</script>
@endpush
