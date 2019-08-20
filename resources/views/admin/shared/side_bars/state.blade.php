<li class="nav-item {{ (request()->segment(2) == 'list-states'||request()->segment(2) == 'create-state'||request()->segment(2) == 'sort-states') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-globe" aria-hidden="true"></i> <span class="title">States</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.states') }}" class="nav-link "> <span class="title">List States</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.state') }}" class="nav-link ">  <span class="title">Add new State</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.states') }}" class="nav-link ">  <span class="title">Sort States</span> </a> </li>
    </ul>
</li>
