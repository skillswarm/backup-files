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

<header class="gradient">
  <div class="menu-sec">
    <div class="container">
      <div class="logo" style="margin-left: -100px;">
        <a href="#" title=""><img src="{{ asset('EdgeJobPortal/SS logo main.png') }}" style="height:120px;"  alt="" /></a>
      </div><!-- Logo -->

      <div class="btn-extars">
        <ul class="account-btns">
          @if(isset(Auth::user()->first_name))
          <div class="dropdown">
            <a style="color: white;"><i class="la la-user"></i> {{Auth::user()->first_name}} </a>
            <div class="dropdown-content">
              <a href="{{route('home')}}">{{__('Dashboard')}}</a>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('Logout')}}</a>
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
          <li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
          <li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
          @endif
        </ul>
      </div>
      <!-- Btn Extras -->
      <nav>
        <ul style="padding: 10px 0px;">
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
            <a href="{{route('terms_and_conditions')}}" title="">Terms and Conditions</a>
          </li>
        </ul>
      </nav><!-- Menus -->
    </div>
  </div>
</header>

<!-- <section class="overlape">
  <div class="block no-padding">
    <div data-velocity="-.1" style="background: url({{asset('EdgeJobPortal/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
    <div class="container fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header">
            @yield('page_content')
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
