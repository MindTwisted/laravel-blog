<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            data-target="#site-navbar-collapse"
            aria-controls="site-navbar-collapse"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end"
         id="site-navbar-collapse">
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/"
             class="nav-link">
            Main
          </a>
        </li>
        <li class="nav-item">
          <a href="#"
             class="nav-link">
            Blog
          </a>
        </li>
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link"
               href="{{ route('login') }}">Login</a>
          </li>
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
              <a href="{{ route('home') }}"
                 class="dropdown-item">
                Dashboard
              </a>
              <hr>
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