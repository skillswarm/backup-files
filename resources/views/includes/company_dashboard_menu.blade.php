<div class="col-md-3 col-sm-4">
    <ul class="usernavdash">
        <li class="{{ Request::segment(1) === 'company-home' ? 'active' : null }}">
          <a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'company-profile' ? 'active' : null }}">
          <a href="{{ route('company.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Employer Profile')}}</a>
        </li>
        {{-- <li>
          <a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('Company Public Profile')}}</a>
        </li> --}}
        <li class="{{ Request::segment(1) === 'candidate-search' ? 'active' : null }}">
          <a href="{{ route('company.candidate-search') }}"><i class="fa fa-search" aria-hidden="true"></i> {{__('Candidate Search')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'post-job'||Request::segment(1) === 'edit-front-job' ? 'active' : null }}">
          <a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'posted-jobs' ? 'active' : null }}">
          <a href="{{ route('posted.jobs') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Employer Jobs')}}</a>
        </li>
        <li  class="{{ Request::segment(1) === 'post-task'||Request::segment(1) === 'edit-task' ? 'active' : null }}">
          <a href="{{ route('task.postTask') }}"><i class="fa fa-file-o" aria-hidden="true"></i> {{__('Post Problem Statement')}}</a>
        </li>
        <li  class="{{ Request::segment(1) === 'posted-task'||Request::segment(1) === 'view-task-replies'||Request::segment(1) === 'view-reply-details'  ? 'active' : null }}">
          <a href="{{ route('task.postedTask') }}"><i class="fa fa-file-o" aria-hidden="true"></i> {{__('Problem Statements')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'company-followers' ? 'active' : null }}">
          <a href="{{route('company.followers')}}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Employer Followers')}}</a>
        </li>
        <li>
          <a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
</div>
