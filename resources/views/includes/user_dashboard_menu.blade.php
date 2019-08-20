<div class="col-md-3 col-sm-4">
    <ul class="usernavdash">
        <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}">
          <a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'my-profile' ? 'active' : null }}">
          <a href="{{ route('my.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'my-profile#cvs' ? 'active' : null }}">
          <a href="{{url('my-profile#cvs')}}"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Manage Resume')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'my-timeline' ? 'active' : null }}">
          <a href="{{ route('my.timeline') }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('My Timeline')}}</a>
        </li>
        {{-- <li class="{{ Request::segment(1) === 'view-public-profile' ? 'active' : null }}">
          <a href="{{ route('view.public.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a>
        </li> --}}
        <li class="{{ Request::segment(1) === 'my-recommendations' ? 'active' : null }}">
          <a href="{{route('my.recommendations')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('My Recommendations ')}}<span class="badge" id="notify_msg" style="display:none;"></a>
        </li>
        @if($user->verified == 2)
        <li class="{{ Request::segment(1) === 'companies' ? 'active' : null }}">
          <a href="{{ route('company.listing') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Job Search')}}<span class="badge" id="notify_job" style="display:none;"></a>
        </li>
        <li class="{{ Request::segment(1) === 'my-job-applications' ? 'active' : null }}">
          <a href="{{ route('my.job.applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Job Applications')}}</a>
        </li>
        <li class="{{ Request::segment(1) === 'my-favourite-jobs' ? 'active' : null }}">
          <a href="{{ route('my.favourite.jobs') }}"><i class="fa fa-heart" aria-hidden="true"></i> {{__('My Favourite Jobs')}}</a>
        </li>
       <li class="{{ Request::segment(1) === 'my-followings' ? 'active' : null }}">
         <a href="{{route('my.followings')}}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Followings')}}</a>
       </li>
       <li class="{{ Request::segment(1) === 'my-messages'||Request::segment(1) === 'applicant-message-detail' ? 'active' : null }}">
         <a href="{{route('my.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('My Messages')}}</a>
       </li>
        <li class="{{ Request::segment(1) === 'notifications' ? 'active' : null }}">
          <a href="{{ route('notifications') }}"><i class="fa fa-bell" aria-hidden="true"></i> {{__(' My Notifications ')}}<span class="badge" id="notify_task" style="display:none;"></span></a>
        </li>
        @endif
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
