<li class="nav-item {{ (request()->segment(2) == 'list-degree-types'||request()->segment(2) == 'create-degree-type'||request()->segment(2) == 'sort-degree-types') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="title">Degree Types</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.degree.types') }}" class="nav-link "> <span class="title">List Degree Types</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.degree.type') }}" class="nav-link "> <span class="title">Add new Degree Type</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.degree.types') }}" class="nav-link "> <span class="title">Sort Degree Types</span> </a> </li>
    </ul>
</li>
