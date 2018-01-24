<div class="blogSidebar">
  
  @if(isset($filters['text']) ||
      isset($filters['category']) ||
      isset($filters['tag']))
    
    <div class="blogSidebar__activeFilters">
      <div class="alert alert-secondary">
        <h4>Active Filters</h4>
        <p class="blogSidebar__filterItem">
          <strong>Results</strong>: {{ $totalPosts }}
        </p>
        @isset($filters['text'])
          <p class="blogSidebar__filterItem">
            <strong>Text</strong>: {{ $filters['text'] }}
          </p>
        @endisset
        @isset($filters['category'])
          <p class="blogSidebar__filterItem">
            <strong>Category</strong>: {{ $categories
                             ->find($filters['category'])
                             ->title
                             or 'Without category' }}
          </p>
        @endisset
        @isset($filters['tag'])
          <p class="blogSidebar__filterItem">
            <strong>Tag</strong>: {{ $tags
                       ->find($filters['tag'])
                       ->title
                       or 'No such tag' }}
          </p>
        @endisset
        <a href="{{ route('pages.blog') }}"
           class="blogSidebar__resetButton">
          Reset filters
        </a>
      </div>
    </div>
  
  @endif
  
  <form action="{{ route('pages.blog') }}"
        method="GET"
        class="blogSidebar__searchForm">
    <div class="form-group">
      <input id="searchField"
             type="text"
             class="form-control"
             name="text"
             required>
      
      <label for="searchField">Search</label>
    </div>
  </form>
  
  
  <div class="blogSidebar__header">
    Categories
  </div>
  
  <ul class="blogSidebar__categories">
    @forelse($categories as $category)
      <li class="blogSidebar__categoryItem">
        @component('site.components.svgSprites.svgIcon', ['id' => 'angle-double-right'])
        @endcomponent
        <a class="blogSidebar__categoryTitle"
           href="{{ route('pages.blog') }}?category={{ $category->id }}">
          {{ $category->title }}
        </a>
        <span class="blogSidebar__categoryPostsCount">
          ({{ $category->posts_count }})
        </span>
      </li>
    @empty
    @endforelse
  </ul>
  
  <div class="blogSidebar__header">
    Tags
  </div>
  
  <ul class="blogSidebar__tags">
    @forelse($tags as $tag)
      <li class="blogSidebar__tagItem">
        <a class="blogSidebar__tagTitle"
           href="{{ route('pages.blog') }}?tag={{ $tag->id }}">
          {{ $tag->title }}
        </a>
      </li>
    @empty
    @endforelse
  </ul>

</div>
