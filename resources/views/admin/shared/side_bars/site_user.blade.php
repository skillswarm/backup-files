<li class="nav-item {{ (request()->segment(2) == 'list-users'||request()->segment(2) == 'create-user'|| request()->segment(2) == 'create-multiple-users') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Candidate Profiles</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.users') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">List Candidate Profiles</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.user') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">Add new Candidate</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.multiple.user') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">Add Multiple Candidates</span> </a> </li>
    </ul>
</li>
