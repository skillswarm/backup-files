<li class="nav-item {{ (request()->segment(2) == 'list-jobs'||request()->segment(2) == 'create-job') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-briefcase"></i> <span class="title">Jobs</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.jobs') }}" class="nav-link "> <i class="icon-briefcase"></i> <span class="title">List Jobs</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.job') }}" class="nav-link "> <i class="icon-briefcase"></i> <span class="title">Add new Job</span> </a> </li>
    </ul>
</li>
