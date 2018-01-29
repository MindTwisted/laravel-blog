<div class="secondaryNavbar">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <!-- Branding Image -->
      <div class="secondaryNavbar__logo">
        @component('site.components.logo.logo', ['secondary' => true])
        @endcomponent
      </div>
      
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
        
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a href="/"
               class="nav-link">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('pages.blog') }}"
               class="nav-link">
              Blog
            </a>
          </li>
  
          <!-- Authentication Links -->
          @guest
            <li class="nav-item secondaryNavbar__authControls">
              <a class="nav-link"
                 href="{{ route('login') }}">
        
                @component('site.components.svgSprites.svgIcon', ['id' => 'user'])
                @endcomponent
      
              </a>
            </li>
          @else
            <li class="nav-item dropdown secondaryNavbar__authControls">
              <a class="nav-link dropdown-toggle"
                 href="#"
                 id="navbarDropdownMenuLink"
                 data-toggle="dropdown"
                 aria-haspopup="true"
                 aria-expanded="false">
        
                @component('site.components.svgSprites.svgIcon', ['id' => 'user'])
                @endcomponent
      
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
</div>