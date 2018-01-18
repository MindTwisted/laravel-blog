<div class="mainNavbar"
     id="mainNavbar">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <!-- Branding Image -->
      <div class="mainNavbar__secondaryLogo">
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
      
      <div class="collapse navbar-collapse justify-content-center"
           id="site-navbar-collapse">
        
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a href="#app"
               class="nav-link slowScroll">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a href="#sectionBlog"
               class="nav-link slowScroll">
              Blog
            </a>
          </li>
          <li class="nav-item">
            @component('site.components.logo.logo')
            @endcomponent
          </li>
          <li class="nav-item">
            <a href="#sectionAbout"
               class="nav-link slowScroll">
              About Us
            </a>
          </li>
          <li class="nav-item">
            <a href="#sectionContacts"
               class="nav-link slowScroll">
              Contact
            </a>
          </li>
          <!-- Authentication Links -->
          @guest
            <li class="nav-item mainNavbar__authControls">
              <a class="nav-link"
                 href="{{ route('login') }}">
                
                @component('site.components.svgSprites.svgIcon', ['id' => 'user'])
                @endcomponent
              
              </a>
            </li>
          @else
            <li class="nav-item dropdown mainNavbar__authControls">
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
