<li class="nav-item {{ (request()->segment(2) == 'list-result-types'||request()->segment(2) == 'create-result-type'||request()->segment(2) == 'sort-result-types') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="title">Result Types</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.result.types') }}" class="nav-link "> <span class="title">List Result Types</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.result.type') }}" class="nav-link "> <span class="title">Add new Result Type</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.result.types') }}" class="nav-link "> <span class="title">Sort Result Types</span> </a> </li>
    </ul>
</li>
