<li class="nav-item {{ (request()->segment(2) == 'list-industries'||request()->segment(2) == 'create-industry'||request()->segment(2) == 'sort-industries') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-building-o" aria-hidden="true"></i> <span class="title">Industries</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.industries') }}" class="nav-link "> <span class="title">List Industries</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.industry') }}" class="nav-link "> <span class="title">Add new Industry</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.industries') }}" class="nav-link "> <span class="title">Sort Industries</span> </a> </li>
    </ul>
</li>
