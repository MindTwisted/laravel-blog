<div class="sidebar">
  <div class="nav nav-pills flex-column">
    <a href="{{ route('home') }}"
       class="nav-link {{ checkActiveRoute('home') }}">
      Dashboard
    </a>
    
    <div class="sidebar__accordion"
         id="sidebar__accordion"
         data-children=".item">
      
      <div class="item">
        <a data-toggle="collapse"
           data-parent="#sidebar__accordion"
           href="#sidebar__accordion__one"
           aria-expanded="true"
           aria-controls="#sidebar__accordion__one"
           class="nav-link">
          Blog
        </a>
        
        <div id="sidebar__accordion__one"
             class="collapse show sidebar__accordionContent"
             role="tabpanel">
          <a href="{{ route('posts.index') }}"
             class="nav-link
                    {{ checkActiveRoute(['posts.index', 'posts.filter']) }}">
            Posts
          </a>
          <a href="{{ route('categories.index') }}"
             class="nav-link {{ checkActiveRoute('categories.index') }}">
            Categories
          </a>
          <a href="{{ route('tags.index') }}"
             class="nav-link {{ checkActiveRoute('tags.index') }}">
            Tags
          </a>
          <a href="{{ route('comments.index') }}"
             class="nav-link {{ checkActiveRoute(['comments.index',
                                                  'comments.filter']) }}">
            Comments
          </a>
        </div>
      </div>
    
    </div>
  </div>
</div>