<div class="col-md-3 col-sm-4">
    <ul class="usernavdash">
        <li class="{{ Request::segment(2) === 'home' ? 'active' : null }}">
          <a href="{{route('mentor.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'my-profile' ? 'active' : null }}">
          <a href="{{route('mentor.my-profile')}}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'assigned-profiles' ? 'active' : null }}">
          <a href="{{route('mentor.assigned-profiles')}}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Assigned Profiles')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'verified-profiles' ? 'active' : null }}">
          <a href="{{route('mentor.verified-profiles')}}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Verified Profiles')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'my-messages'||Request::segment(2) === 'messages-detail' ? 'active' : null }}">
          <a href="{{route('mentor.my-messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('My Messages')}}</a>
        </li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
            <form id="logout-form" action="{{ route('mentor.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
