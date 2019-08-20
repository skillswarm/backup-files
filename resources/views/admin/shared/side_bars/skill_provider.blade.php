<li class="nav-item {{ (request()->segment(2) == 'list-skill-providers'||request()->segment(2) == 'create-skill-provider') ? 'open active' : '' }} "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Skill Providers</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route('list.skill-providers') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">List Skill Providers</span> </a> </li>
        <li class="nav-item  "> <a href="{{ route('create.skill-provider') }}" class="nav-link "> <i class="icon-user"></i> <span class="title">Add new Skill Provider</span> </a> </li>
    </ul>
</li>
