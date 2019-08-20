<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  border-radius: 5px;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-top: 55px;
  margin-left: 25px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;border-radius: 5px;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<div class="responsive-header">
  <div class="responsive-menubar">
    <div class="res-logo"><a href="index.html" title=""><img src="{{ asset('EdgeJobPortal/SS logo main.png') }}" alt="" /></a></div>
    <div class="menu-resaction">
      <div class="res-openmenu">
        <img src="{{ asset('EdgeJobPortal/icon.png') }}" alt="" /> Menus
      </div>
      <div class="res-closemenu">
        <img src="{{ asset('EdgeJobPortal/icon2.png') }}" alt="" /> Close
      </div>
    </div>
  </div>
  <div class="responsive-opensec">
    <div class="btn-extars">
      <ul class="account-btns">
        @if(isset(Auth::user()->first_name))
          <li><a> {{Auth::user()->first_name}} </a></li>
        @elseif(isset(Auth::guard('company')->user()->name))
          <li><a> {{Auth::guard('company')->user()->name}} </a></li>
        @elseif(isset(Auth::guard('mentor')->user()->first_name))
          <li><a> {{Auth::guard('mentor')->user()->first_name}} </a></li>
        @elseif(isset(Auth::guard('skill_provider')->user()->name))
          <li><a> {{Auth::guard('skill_provider')->user()->name}} </a></li>
        @else
          <li class="signup-popup"><a title=""> SIGN UP</a></li>
          <li class="signin-popup"><a title=""> LOGIN </a></li>
        @endif
      </ul>
    </div><!-- Btn Extras -->
    <div class="responsivemenu">
      <ul>
        <li>
          <a href="{{route('index')}}" title="">Home</a>
        </li>
        <li>
          <a href="{{route('about')}}" title="">About Us</a>
        </li>
        <li>
          <a href="{{route('contact')}}" title="">Contact Us</a>
        </li>
        <li>
          <a href="{{route('solutions')}}" title="">Solutions</a>
        </li>
        <li>
          <a href="{{route('terms_and_conditions')}}" title="">Terms & Conditions</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- <header class="stick-top forsticky new-header"> -->
<header class="gradient">
  <div class="menu-sec">
    <div class="container">
      <div class="logo">
        <a><img class="hidesticky" src="{{ asset('EdgeJobPortal/SS logo main.png') }}" style="height:120px;" alt="" />
          <img class="showsticky" src="{{ asset('EdgeJobPortal/SS logo main.png') }}" style="height:120px;" alt="" /></a>
      </div><!-- Logo -->
      <div class="btn-extars">
        <ul class="account-btns">
          @if(isset(Auth::user()->first_name))
          <div class="dropdown">
            <a style="color: white;"><i class="la la-user"></i> {{Auth::user()->first_name}} </a>
            <div class="dropdown-content">
              <a href="{{route('home')}}">Dashboard</a>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </div>
          @elseif(isset(Auth::guard('company')->user()->name))
          <div class="dropdown">
            <a style="color: white;"><i class="la la-user"></i> {{Auth::guard('company')->user()->name}} </a>
            <div class="dropdown-content">
              <a href="{{route('company.home')}}">{{__('Dashboard')}}</a>
              <a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </div>
          @elseif(isset(Auth::guard('mentor')->user()->first_name))
          <div class="dropdown">
            <a style="color: white;"><i class="la la-user"></i> {{Auth::guard('mentor')->user()->first_name}} </a>
            <div class="dropdown-content">
              <a href="{{route('mentor.home')}}">{{__('Dashboard')}}</a>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
              <form id="logout-form" action="{{ route('mentor.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </div>
          @elseif(isset(Auth::guard('skill_provider')->user()->name))
          <div class="dropdown">
            <a style="color: white;"><i class="la la-user"></i> {{Auth::guard('skill_provider')->user()->name}} </a>
            <div class="dropdown-content">
              <a href="{{route('skill-provider.home')}}">{{__('Dashboard')}}</a>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
              <form id="logout-form" action="{{ route('skill-provider.logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </div>
          @else
          <li class="signup-popup"><a title=""> SIGN UP</a></li>
          <li class="signin-popup"><a title=""> LOGIN </a></li>
          @endif
        </ul>
      </div><!-- Btn Extras -->
      <nav>
        <ul>
          <li>
            <a href="{{route('index')}}" title="">Home</a>
          </li>
          <li>
            <a href="{{route('about')}}" title="">About Us</a>
          </li>
          <li>
            <a href="{{route('contact')}}" title="">Contact Us</a>
          </li>
          <li>
            <a href="{{route('solutions')}}" title="">Solutions</a>
          </li>
          <li>
            <a href="{{route('terms_and_conditions')}}" title="">Terms & Conditions</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
