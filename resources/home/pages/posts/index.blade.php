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
          
          <div class="row">
            <div class="col-md-12">
              
              <div class="postsPage__filterPanel">
                @component('home.components.postsFilterPanel.postsFilterPanel',
                  ['totalPosts' => $posts->total(), 'filters' => $filters])
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
                  {{ $posts->appends($filters)->links('views.vendor.pagination.bootstrap-4') }}
                </div>
              </div>
            </div>
          @endif
        
        </div>
      </div>
    </div>
  </div>
@endsection