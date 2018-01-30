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
            
            <div class="postPage__prevNextNavigation">
              <a
                  @if($prevNextID['previous'])
                  href="{{ route('pages.blog') . '/' . $prevNextID['previous'] }}"
                  @endif
                  class="postPage__prevNextLink">
                
                @component('site.components.svgSprites.svgIcon', ['id' => 'angle-left'])
                @endcomponent
              
              </a>
              <a
                  @if($prevNextID['next'])
                  href="{{ route('pages.blog') . '/' . $prevNextID['next'] }}"
                  @endif
                  class="postPage__prevNextLink">
                Next post
              </a>
            </div>
            
            <div class="postPage__comments">
              
              <div class="postPage__sectionTitle">
                Say what's on your mind
              </div>
              
              <div class="postPage__commentsBody">
                @forelse($post->approvedComments as $comment)
                  <div class="postPage__commentItem">
                    
                    <div class="postPage__commentImage">
                      <img src="/images/landing/folder.png"
                           alt="Folder">
                    </div>
                    
                    <div class="postPage__commentAuthor">
                      {{ $comment->author_name }}
                    </div>
                    <div class="postPage__commentBody">
                      {{ $comment->body }}
                    </div>
                  </div>
                @empty
                  <div class="postPage__emptyComments">
                    There are no comments yet.
                  </div>
                @endforelse
              </div>
            
            </div>
            
            <form action="{{ route('site.storeComment') }}"
                  method="POST"
                  class="postPage__commentForm">
              
              {{ csrf_field() }}
              
              <input type="hidden"
                     name="post"
                     class="form-control"
                     value="{{ $post->id }}">
              
              <div class="row">
                
                <div class="col-md d-flex flex-wrap align-content-between">
                  <div class="form-group">
                    <input type="text"
                           name="author_name"
                           class="form-control"
                           id="name"
                           required>
                    <label for="name">Name</label>
                    <div class="invalid-feedback"></div>
                  </div>
                  
                  <div class="form-group">
                    <input type="email"
                           name="author_email"
                           class="form-control"
                           id="email"
                           required>
                    <label for="email">Email</label>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                
                <div class="col-md">
                  <div class="form-group">
                    <textarea name="body"
                              id="message"
                              class="form-control"
                              required></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
              
              </div>
              
              <div class="row">
                
                <div class="col">
                  <div class="form-group">
                    <button type="submit"
                            class="btn btn-outline-danger btn-block">
                      Submit
                    </button>
                  </div>
                </div>
              
              </div>
            
            </form>
            
            @if($post->category && count($post->category->postsExcept($post->id)->get()) > 1)
              <div class="postPage__relatedPosts">
                
                <div class="postPage__sectionTitle">
                  Related posts
                </div>
                
                <div class="postPage__relatedPostsCarousel owl-carousel">
                  
                  @foreach($post->category->postsExcept($post->id)->get() as $relatedPost)
                    
                    <div class="postPage__relatedPostsItem">
                      
                      <a href="{{ route('pages.post', $relatedPost->id) }}"
                         class="postPage__relatedPostTitle">
                        {{ $relatedPost->title }}
                      </a>
                      
                      @component('site.components.blogPost.postPartials.postImage.postImage',
                        ['size' => 'small', 'post' => $relatedPost])
                      @endcomponent
                    
                    </div>
                  
                  @endforeach
                
                </div>
              
              </div>
            @endif
          
          </div>
        
        </div>
      </div>
    
    </div>
    
    @component('site.components.mainFooter.mainFooter')
    @endcomponent
  </div>
@endsection
