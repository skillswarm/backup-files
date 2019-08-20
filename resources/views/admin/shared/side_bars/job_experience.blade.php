<li class="nav-item {{ (request()->segment(2) == 'list-job-experiences'||request()->segment(2) == 'create-job-experience'||request()->segment(2) == 'sort-job-experiences') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-pie-chart" aria-hidden="true"></i> <span class="title">Job Experiences</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.job.experiences') }}" class="nav-link ">  <span class="title">List Job Experiences</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.job.experience') }}" class="nav-link ">  <span class="title">Add new Job Experience</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.job.experiences') }}" class="nav-link ">  <span class="title">Sort Job Experiences</span> </a> </li>
    </ul>
</li>
