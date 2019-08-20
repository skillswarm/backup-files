<li class="nav-item {{ (request()->segment(2) == 'list-language-levels'||request()->segment(2) == 'create-language-level'||request()->segment(2) == 'sort-language-levels') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-bar-chart" aria-hidden="true"></i> <span class="title">Language Levels</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.language.levels') }}" class="nav-link "> <span class="title">List Language Levels</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.language.level') }}" class="nav-link ">  <span class="title">Add new Language Level</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('sort.language.levels') }}" class="nav-link ">  <span class="title">Sort Language Levels</span> </a> </li>
    </ul>
</li>
