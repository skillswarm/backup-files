<div class="col-md-3 col-sm-4">
    <ul class="usernavdash">
        <li class="{{ Request::segment(2) === 'home' ? 'active' : null }}">
          <a href="{{route('skill-provider.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'profile' ? 'active' : null }}">
          <a href="{{ route('skill-provider.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Profile')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'list-skill-course' ? 'active' : null }}">
          <a href="{{ route('skill-provider.listSkillCourse') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Skill Courses')}}</a>
        </li>
        <li class="{{ Request::segment(2) === 'add-skill-course'|| Request::segment(2) === 'edit-skill-course' ? 'active' : null }}">
          <a href="{{ route('skill-provider.createSkillCourse') }}"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Add Course')}}</a>
        </li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
            <form id="logout-form" action="{{ route('skill-provider.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
