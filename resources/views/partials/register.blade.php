<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Sign Up</h3>

				<div class="select-user">
					<ul class="nav nav-tabs">
						<?php
						$c_or_e = old('candidate_or_employer', 'candidate');
						?>
				    <li><a data-toggle="tab" href="#candidate1" aria-expanded="true" class="{{($c_or_e == 'candidate')? 'active':''}}">Candidate</a></li>
				    <li><a data-toggle="tab" href="#employer1" aria-expanded="false" class="{{($c_or_e == 'employer')? 'active':''}}">Employer</a></li>
						<li><a data-toggle="tab" href="#mentor1" aria-expanded="false" class="{{($c_or_e == 'mentor')? 'active':''}}">Mentor</a></li>
						<li><a data-toggle="tab" href="#skill-provider1" aria-expanded="false" class="{{($c_or_e == 's-provider')? 'active':''}}">Skill Provider</a></li>
				  </ul>

					<div class="tab-content">
				    <div id="candidate1" class="formpanel tab-pane fade {{($c_or_e == 'candidate')? 'in active show':''}}">
							<form class="form-horizontal" method="POST" action="{{ route('register') }}" id="candidate-register">
								{{ csrf_field() }}
								<input type="hidden" name="candidate_or_employer" value="candidate" />
								<div class="cfield">
									<input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
									<!-- <i class="la la-user"></i> -->
										<span class="help-block" id="first_name-can-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('first_name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="text" name="middle_name" class="form-control" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">
										<span class="help-block" id="middle_name-can-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('middle_name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
										<span class="help-block" id="last_name-can-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('last_name') }}</strong>
									 	</span>
								</div>
								<div class="cfield">
									<input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
									<!-- <i class="la la-envelope-o"></i> -->
									 <span class="help-block" id="email-can-error">
										  <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
									</span>
								</div>
								<div class="cfield">
									<input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">
									<!-- <i class="la la-key"></i> -->
									 <span class="help-block" id="password-can-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
									 </span>
								</div>
								<div class="cfield">
									<input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
									<span class="help-block" id="password_confirmation-can-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password_confirmation') }}</strong>
									</span>
								</div>
								<p class="remember-label">
									<input type="checkbox" name="terms_of_use" value="1" id="cbn1" style="margin-top: 8px;">
									<a href="#" style="margin-left: 20px;">{{__('I accept Terms of Use')}}</a>
									<span class="help-block" id="terms_of_use-can-error">
										<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('terms_of_use') }}</strong>
									</span>
								</p>
								<button type="submit" class="btn">Signup</button>
							</form>
				    </div>
				    <div id="employer1" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'in active show':''}}">
							<form class="form-horizontal" method="POST" action="{{ route('company.register') }}" id="employer-register">
								{{ csrf_field() }}
								<input type="hidden" name="candidate_or_employer" value="employer" />
								<div class="cfield">
								  <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">
									<!-- <i class="la la-user"></i> -->
										<span class="help-block" id="name-emp-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
										<span class="help-block" id="email-emp-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">
									<!-- <i class="la la-key"></i> -->
									 <span class="help-block" id="password-emp-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
									 </span>
								</div>
								<div class="cfield">
									<input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
									<span class="help-block" id="password_confirmation-emp-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password_confirmation') }}</strong>
									</span>
								</div>
								<p class="remember-label">
									<input type="checkbox" name="terms_of_use" value="1" id="cbn2" style="margin-top: 8px;">
									<a href="#" style="margin-left: 20px;">{{__('I accept Terms of Use')}}</a>
									<span class="help-block" id="terms_of_use-emp-error">
										<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('terms_of_use') }}</strong>
									</span>
								</p>
								<button type="submit" class="btn">Signup</button>
							</form>
				    </div>
						<div id="mentor1" class="formpanel tab-pane fade {{($c_or_e == 'mentor')? 'in active show':''}}">
							<form class="form-horizontal" method="POST" action="{{ route('mentor.register') }}" id="mentor-register">
								{{ csrf_field() }}
								<input type="hidden" name="candidate_or_employer" value="mentor" />
								<div class="cfield">
									<input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
									<!-- <i class="la la-user"></i> -->
										<span class="help-block" id="first_name-men-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('first_name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="text" name="middle_name" class="form-control" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">
										<span class="help-block" id="middle_name-men-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('middle_name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
										<span class="help-block" id="last_name-men-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('last_name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
									<!-- <i class="la la-envelope-o"></i> -->
									 <span class="help-block" id="email-men-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
									</span>
								</div>
								<div class="cfield">
									<input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">
									<!-- <i class="la la-key"></i> -->
									 <span class="help-block" id="password-men-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
									 </span>
								</div>
								<div class="cfield">
									<input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
									<span class="help-block" id="password_confirmation-men-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password_confirmation') }}</strong>
									</span>
								</div>
								<p class="remember-label">
									<input type="checkbox" name="terms_of_use" value="1" id="cbn3" style="margin-top: 8px;">
									<a href="#" style="margin-left: 20px;">{{__('I accept Terms of Use')}}</a>
									<span class="help-block" id="terms_of_use-men-error">
										<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('terms_of_use') }}</strong>
									</span>
								</p>
								<button type="submit" class="btn">Signup</button>
							</form>
						</div>
						<div id="skill-provider1" class="formpanel tab-pane fade {{($c_or_e == 's-provider')? 'in active show':''}}">
							<form class="form-horizontal" method="POST" action="{{ route('skill-provider.register') }}" id="s-provider-register">
								{{ csrf_field() }}
								<input type="hidden" name="candidate_or_employer" value="skill_provider" />
								<div class="cfield">
									<input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">
									<!-- <i class="la la-user"></i> -->
										<span class="help-block" id="name-sk-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('name') }}</strong>
										</span>
								</div>
								<div class="cfield">
									<input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
									<!-- <i class="la la-envelope-o"></i> -->
									 <span class="help-block" id="email-sk-error">
											<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('email') }}</strong>
									</span>
								</div>
								<div class="cfield">
									<input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">
									<!-- <i class="la la-key"></i> -->
									 <span class="help-block" id="password-sk-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password') }}</strong>
									 </span>
								</div>
								<div class="cfield">
									<input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
									<span class="help-block" id="password_confirmation-sk-error">
										 <strong style="color:#a94442;font-weight: normal;">{{ $errors->first('password_confirmation') }}</strong>
									</span>
								</div>
								<p class="remember-label">
									<input type="checkbox" name="terms_of_use" value="1" id="cbn4" style="margin-top: 8px;">
									<a href="#" style="margin-left: 20px;">{{__('I accept Terms of Use')}}</a>
									<span class="help-block" id="terms_of_use-sk-error">
										<strong style="color:#a94442;font-weight: normal;">{{ $errors->first('terms_of_use') }}</strong>
									</span>
								</p>
								<button type="submit" class="btn">Signup</button>
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
