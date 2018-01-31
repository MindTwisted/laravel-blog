<div class="smallBlogPost">
  
  <div class="smallBlogPost__image">
    
    @component('site.components.blogPost.postPartials.postImage.postImage',
    ['size' => 'small', 'post' => $post])
    @endcomponent
  
  </div>
  
  <div class="smallBlogPost__content">
    
    <a href="{{ route('pages.post', ['id' => $post->id]) }}"
       class="smallBlogPost__title">
      
      @component('site.components.blogPost.postPartials.postTitle.postTitle',
        ['size' => 'small'])
        @slot('title')
          {{ $post->title }}
        @endslot
      @endcomponent
    
    </a>
    
    <div class="smallBlogPost__separator">
      @component('site.components.blogPost.postPartials.postSeparator.postSeparator')
      @endcomponent
    </div>
    
    <div class="smallBlogPost__statsBox">
      
      @component('site.components.blogPost.postPartials.postStatItem.postStatItem',
        ['svgId' => 'calendar'])
        @slot('text')
          {{ $post->updated_at->formatLocalized('%d %B %Y') }}
        @endslot
      @endcomponent
      
      @component('site.components.blogPost.postPartials.postStatItem.postStatItem',
        ['svgId' => 'comment'])
        @slot('text')
          {{ $post->comments_count }} comments
        @endslot
      @endcomponent
    
    </div>
    
    <div class="smallBlogPost__body">
      
      @component('site.components.blogPost.postPartials.postBody.postBody')
        @slot('body')
          {{ trimString($post->body_preview, 250) }}
        @endslot
      @endcomponent
    
    </div>
    <div class="smallBlogPost__button">
      <a href="{{ route('pages.post', ['id' => $post->id]) }}"
         class="btn btn-outline-danger">
        read more
      </a>
    </div>
  
  </div>
</div>