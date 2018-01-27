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
        </ul>
      </div>
    </div>
  </nav>
</div>