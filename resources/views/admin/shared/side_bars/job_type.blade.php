<li class="nav-item {{ (request()->segment(2) == 'list-job-types'||request()->segment(2) == 'create-job-type'||request()->segment(2) == 'sort-job-types') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-briefcase" aria-hidden="true"></i> <span class="title">Job Types</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.job.types') }}" class="nav-link"> <span class="title">List Job Types</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.job.type') }}" class="nav-link"> <span class="title">Add new Job Type</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.job.types') }}" class="nav-link"> <span class="title">Sort Job Types</span> </a> </li>
    </ul>
</li>
