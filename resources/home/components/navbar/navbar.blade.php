<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand"
       href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    
    <!-- Collapsed Hamburger -->
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#home-navbar-collapse"
            aria-controls="home-navbar-collapse"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end"
         id="home-navbar-collapse">
      
      <ul class="navbar-nav">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"
                 href="#"
                 id="navbarDropdownMenuLink"
                 data-toggle="dropdown"
                 aria-haspopup="true"
                 aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              
              <div class="dropdown-menu">
                <a href="{{ route('logout') }}"
                   class="dropdown-item"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                </a>
                
                <form id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST">
                  {{ csrf_field() }}
                </form>
              </div>
            </li>
            @endguest
      </ul>
    </div>
  </div>
</nav>