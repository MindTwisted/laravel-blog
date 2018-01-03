<div class="sidebar">
  <div class="sidebar__brand">
    <a href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
  </div>
  
  <div class="nav nav-pills flex-column">
    <a href="{{ route('home') }}"
       class="nav-link {{ checkActiveRoute('home') }}">
      @component('home.components.svgIcons.svgIcon', ['id' => 'icon-dashboard'])
      @endcomponent
      Dashboard
    </a>
    
    <a href="{{ route('posts.index') }}"
       class="nav-link
                    {{ checkActiveRoute(['posts.index', 'posts.filter']) }}">
      @component('home.components.svgIcons.svgIcon', ['id' => 'icon-book'])
      @endcomponent
      Posts
    </a>
    
    <a href="{{ route('categories.index') }}"
       class="nav-link {{ checkActiveRoute('categories.index') }}">
      @component('home.components.svgIcons.svgIcon', ['id' => 'icon-folder-open'])
      @endcomponent
      Categories
    </a>
    
    <a href="{{ route('tags.index') }}"
       class="nav-link {{ checkActiveRoute('tags.index') }}">
      @component('home.components.svgIcons.svgIcon', ['id' => 'icon-price-tag'])
      @endcomponent
      Tags
    </a>
    
    <a href="{{ route('comments.index') }}"
       class="nav-link {{ checkActiveRoute(['comments.index',
                                                  'comments.filter']) }}">
      @component('home.components.svgIcons.svgIcon', ['id' => 'icon-bubble'])
      @endcomponent
      Comments
    </a>
  
  </div>
</div>