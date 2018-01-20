@extends('site.layouts.master')

@section('content')
  <div class="blogPage">
    
    @component('site.components.secondaryHeader.secondaryHeader',
      ['breadcrumbName' => 'blog'])
      @slot('title')
        Blog
      @endslot
    @endcomponent
    
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          
          <div class="blogPage__content">
            @if(count($posts) > 0)
              @foreach($posts as $post)
                @component('site.components.blogPost.mediumBlogPost.mediumBlogPost', compact('post'))
                @endcomponent
              @endforeach
            @else
              <p class="blogPage__empty">There is no posts yet</p>
            @endif
          </div>
        
        </div>
      </div>
      
      @if(method_exists($posts, 'links'))
        <div class="row">
          <div class="col-md-12">
            <div class="blogPage__pagination">
              {{ $posts->links('views.vendor.pagination.bootstrap-4-public-blog') }}
            </div>
          </div>
        </div>
      @endif
    
    </div>
    
    @component('site.components.mainFooter.mainFooter')
    @endcomponent
  </div>
@endsection

{{--TODO: add sidebar--}}
