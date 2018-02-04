@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__title">
        <h1>Blog stats</h1>
      </div>
      
      <div class="row">
        
        @if($postsCount > 0)
          
          <div class="col-xl-12">
            
            <div class="card homePage__chartWrap">
              <canvas class="homePage__postPerDateChart"
                      data-url="{{ route('stats.post-per-date') }}"></canvas>
            </div>
          
          </div>
        
        @endif
        
        @if($postsCount > 0 && $categoriesCount > 0)
          
          <div class="col-xl-12">
            
            <div class="card homePage__chartWrap">
              <canvas class="homePage__postPerCategoryChart"
                      data-url="{{ route('stats.post-category') }}"></canvas>
            </div>
          
          </div>
        
        @endif
        
        @if($postsCount === 0 && $categoriesCount === 0)
          <div class="col-xl-12">
            
            <p>There are no posts and categories in this blog now.</p>
          
          </div>
        @endif
        
        <div class="homePage__mobileDashboardContent">
          <p>You can see the following sections:</p>
          <ul>
            <li>
              <a href="{{ route('posts.index') }}">Posts</a>
            </li>
            <li>
              <a href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li>
              <a href="{{ route('tags.index') }}">Tags</a>
            </li>
            <li>
              <a href="{{ route('comments.index') }}">Comments</a>
            </li>
          </ul>
        </div>
      
      </div>
    
    </div>
  </div>
@endsection
