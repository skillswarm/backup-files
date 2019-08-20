<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>User Login</h3>

		<div class="select-user">
			<ul class="nav nav-tabs">
				<?php
				$c_or_e = old('candidate_or_employer', 'candidate');
				?>
		    <li><a data-toggle="tab" href="#candidate" aria-expanded="true" class="{{($c_or_e == 'candidate')? 'active':''}}">Candidate</a></li>
		    <li><a data-toggle="tab" href="#employer" aria-expanded="false" class="{{($c_or_e == 'employer')? 'active':''}}">Employer</a></li>
				<li><a data-toggle="tab" href="#mentor" aria-expanded="false" class="{{($c_or_e == 'mentor')? 'active':''}}">Mentor</a></li>
				<li><a data-toggle="tab" href="#skill-provider" aria-expanded="false" class="{{($c_or_e == 's-provider')? 'active':''}}">Skill Provider</a></li>
		  </ul>

			<div class="tab-content">
		    <div id="candidate" class="formpanel tab-pane fade {{($c_or_e == 'candidate')? 'in active show':''}}">
					<form class="form-horizontal" method="POST" action="{{ route('login') }}" id="candidate-login">
					  {{ csrf_field() }}
					  <input type="hidden" name="candidate_or_employer" value="candidate" />
					  <div class="cfield">
					    <input id="email1" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
					    <!-- <i class="la la-user"></i> -->
					    <span class="help-block" id="email-error">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
					    </span>
					  </div>
					  <div class="cfield">
					    <input id="password1" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
					    <!-- <i class="la la-key"></i> -->
					    <span class="help-block" id="password-error">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
					    </span>
					  </div>
					  <p class="remember-label">
					    <input type="checkbox" name="cb1" id="cb1" style="margin-top: 7px;"><label for="cb1">Remember me</label>
					  </p>
					  <a href="#" title="">Forgot Password?</a>
					  <button type="submit" class="btn">Login</button>
					</form>
		    </div>
		    <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'in active show':''}}">
					<form class="form-horizontal" method="POST" action="{{ route('company.login') }}" id="employer-login">
					  {{ csrf_field() }}
					  <input type="hidden" name="candidate_or_employer" value="employer" />
					  <div class="cfield">
					    <input id="email2" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
					    <!-- <i class="la la-user"></i> -->
					    <span class="help-block" id="email-error-e">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
					    </span>
					  </div>
					  <div class="cfield">
					    <input id="password2" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
					    <!-- <i class="la la-key"></i> -->
					    <span class="help-block" id="password-error-e">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
					    </span>
					  </div>
					  <p class="remember-label">
					    <input type="checkbox" name="cb2" id="cb2" style="margin-top: 7px;"><label for="cb2">Remember me</label>
					  </p>
					  <a href="#" title="">Forgot Password?</a>
					  <button type="submit" class="btn">Login</button>
					</form>
		    </div>
				<div id="mentor" class="formpanel tab-pane fade {{($c_or_e == 'mentor')? 'in active show':''}}">
					<form class="form-horizontal" method="POST" action="{{ route('mentor.login') }}" id="mentor-login">
					  {{ csrf_field() }}
					  <input type="hidden" name="candidate_or_employer" value="mentor" />
					  <div class="cfield">
					    <input id="email3" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
					    <!-- <i class="la la-user"></i> -->
					    <span class="help-block" id="email-error-m">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
					    </span>
					  </div>
					  <div class="cfield">
					    <input id="password3" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
					    <!-- <i class="la la-key"></i> -->
					    <span class="help-block" id="password-error-m">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
					    </span>
					  </div>
					  <p class="remember-label">
					    <input type="checkbox" name="cb1" id="cb3" style="margin-top: 7px;"><label for="cb3">Remember me</label>
					  </p>
					  <a href="#" title="">Forgot Password?</a>
					  <button type="submit" class="btn">Login</button>
					</form>
		    </div>
				<div id="skill-provider" class="formpanel tab-pane fade {{($c_or_e == 's-provider')? 'in active show':''}}">
					<form class="form-horizontal" method="POST" action="{{ route('skill-provider.login') }}" id="s-provider-login">
					  {{ csrf_field() }}
					  <input type="hidden" name="candidate_or_employer" value="skill_provider" />
					  <div class="cfield">
					    <input id="email4" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
					    <!-- <i class="la la-user"></i> -->
					    <span class="help-block" id="email-error-s">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
					    </span>
					  </div>
					  <div class="cfield">
					    <input id="password4" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
					    <!-- <i class="la la-key"></i> -->
					    <span class="help-block" id="password-error-s">
					        <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
					    </span>
					  </div>
					  <p class="remember-label">
					    <input type="checkbox" name="cb1" id="cb4" style="margin-top: 7px;"><label for="cb4">Remember me</label>
					  </p>
					  <a href="#" title="">Forgot Password?</a>
					  <button type="submit" class="btn">Login</button>
					</form>
		    </div>
		  </div>
		</div>

		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div>
