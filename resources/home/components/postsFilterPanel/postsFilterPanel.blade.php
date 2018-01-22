<div class="postsFilterPanel">
  
  @if(isset($filters['text']) ||
      isset($filters['category']) ||
      isset($filters['tag']) ||
      isset($filters['order']))
    
    <div class="postsFilterPanel__activeFilters">
      <div class="alert alert-primary">
        <h4>Active Filters</h4>
        <p class="postsFilterPanel__filterItem">
          Results: {{ $totalPosts }}
        </p>
        @isset($filters['text'])
          <p class="postsFilterPanel__filterItem">
            Text: {{ $filters['text'] }}
          </p>
        @endisset
        @isset($filters['category'])
          <p class="postsFilterPanel__filterItem">
            Category: {{ $categories
                             ->find($filters['category'])
                             ->title
                             or 'Without category' }}
          </p>
        @endisset
        @isset($filters['tag'])
          <p class="postsFilterPanel__filterItem">
            Tag: {{ $tags
                       ->find($filters['tag'])
                       ->title
                       or 'No such tag' }}
          </p>
        @endisset
        @isset($filters['order'])
          <p class="postsFilterPanel__filterItem">
            Latest posts first
          </p>
        @endisset
        <a href="{{ route('posts.index') }}">
          Reset filters
        </a>
      </div>
    </div>
  
  @endif
  
  <div class="postFiltersPanel__panel">
    <div class="card">
      <div class="card-header">
        Filter posts
      </div>
      <div class="card-body">
        <form action="{{ route('posts.index') }}"
              method="GET">
          <div class="row postsFilterPanel__formWrapper">
            <div class="col-lg-4">
              <input type="text"
                     class="form-control"
                     name="text"
                     placeholder="Enter filter query">
            </div>
            <div class="col-lg-4">
              <select class="form-control"
                      name="category">
                <option value="">Choose category ...</option>
                <option value="NO_CATEGORY">Without category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">
                    {{ $category->title }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4">
              <select class="form-control"
                      name="tag">
                <option value="">Choose tag ...</option>
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}">
                    {{ $tag->title }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row postsFilterPanel__formWrapper">
            <div class="col-lg-6">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input"
                         type="checkbox"
                         name="order"
                         value="DESC">
                  Latest posts first
                </label>
              </div>
            </div>
          </div>
          <div class="row postsFilterPanel__formWrapper">
            <div class="col-lg-6">
              <button type="submit"
                      class="btn btn-primary">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>