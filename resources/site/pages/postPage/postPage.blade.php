@extends('site.layouts.master')

@section('content')
  <div class="postPage">
    
    @component('site.components.secondaryHeader.secondaryHeader',
      ['breadcrumbName' => 'post', 'post' => $post])
      @slot('title')
        Post
      @endslot
    @endcomponent
    
    <div class="container">
      <div class="row">
        <div class="col-lg-3 order-lg-2">
          
          <div class="postPage__sidebar">
            @component('site.components.blogSidebar.blogSidebar')
            @endcomponent
          </div>
        
        </div>
        <div class="col-lg-9 order-lg-1">
          
          <div class="postPage__content">
            
            @component('site.components.blogPost.largeBlogPost.largeBlogPost',
              ['post' => $post])
            @endcomponent
          
          </div>
        
        </div>
      </div>
    
    </div>
    
    @component('site.components.mainFooter.mainFooter')
    @endcomponent
  </div>
@endsection
