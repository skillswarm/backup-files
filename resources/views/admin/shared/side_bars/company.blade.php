<li class="nav-item {{ (request()->segment(2) == 'list-companies'||request()->segment(2) == 'create-company') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-building"></i> <span class="title">Employers</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.companies') }}" class="nav-link "> <i class="fa fa-building"></i> <span class="title">List Employers</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.company') }}" class="nav-link "> <i class="fa fa-building"></i> <span class="title">Add new Employer</span> </a> </li>
    </ul>
</li>
