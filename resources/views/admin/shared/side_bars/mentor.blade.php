<li class="nav-item {{ (request()->segment(2) == 'list-mentors'||request()->segment(2) == 'create-mentor') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Mentors</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{route('list.mentors')}}" class="nav-link "> <i class="icon-user"></i> <span class="title">List Mentors</span> </a> </li>
        <li class="nav-item  "> <a href="{{route('create.mentor')}}" class="nav-link "> <i class="icon-user"></i> <span class="title">Add new Mentor</span> </a> </li>
    </ul>
</li>
