@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('posts') }}
      </div>
      <div class="homePage__title">
        <h1>Posts</h1>
        <div class="homePage__addResourceButton">
          @component('home.components.addResourceButton.addResourceButton',
                      ['resource' => 'posts'])
          @endcomponent
        </div>
      </div>
      <div class="homePage__content">
        <div class="postsPage">
          
          @isset($filters)
            
            <div class="row">
              <div class="col-md-12">
                
                <div class="postsPage__activeFilters">
                  <div class="alert alert-primary">
                    <h4>Active Filters</h4>
                    <p class="postsPage__filterItem">
                      Results: {{ count($posts) }}
                    </p>
                    @if($filters['text'])
                      <p class="postsPage__filterItem">
                        Text: {{ $filters['text'] }}
                      </p>
                    @endif
                    @if($filters['category'])
                      <p class="postsPage__filterItem">
                        Category: {{ $categories
                                        ->find($filters['category'])
                                        ->title
                                        or 'Without category' }}
                      </p>
                    @endif
                    @if($filters['order'])
                      <p class="postsPage__filterItem">
                        Latest posts first
                      </p>
                    @endif
                    <a href="{{ route('posts.index') }}">
                      Reset filters
                    </a>
                  </div>
                </div>
              
              </div>
            </div>
          
          @endisset
          
          <div class="row">
            <div class="col-md-12">
              
              <div class="postsPage__filterPanel">
                @component('home.components.postsFilterPanel.postsFilterPanel',
                          compact('categories'))
                @endcomponent
              </div>
            
            </div>
          </div>
          
          <div class="row">
            
            @forelse($posts as $post)
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="postsPage__post">
                  @component('home.components.postItem.postItem',
                    compact('post'))
                  @endcomponent
                </div>
              </div>
            @empty
              <div class="col-md-12">
                <div class="homePage__emptyQuery">
                  There are no results
                </div>
              </div>
            @endforelse
          
          </div>
          
          @if(method_exists($posts, 'links'))
            <div class="row">
              <div class="col-md-12">
                <div class="homePage__pagination">
                  {{ $posts->links('views.vendor.pagination.simple-bootstrap-4') }}
                </div>
              </div>
            </div>
          @endif
        
        </div>
      </div>
    </div>
  </div>
@endsection