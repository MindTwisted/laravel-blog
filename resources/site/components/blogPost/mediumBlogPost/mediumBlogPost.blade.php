<div class="mediumBlogPost">
  
  <div class="mediumBlogPost__date">
    
    @component('site.components.blogPost.postPartials.postDate.postDate')
      @slot('year')
        {{ $post->updated_at->formatLocalized('%Y') }}
      @endslot
      @slot('month')
        {{ $post->updated_at->formatLocalized('%b') }}
      @endslot
      @slot('day')
        {{ $post->updated_at->formatLocalized('%d') }}
      @endslot
    @endcomponent
  
  </div>
  
  <div class="mediumBlogPost__image">
    
    @component('site.components.blogPost.postPartials.postImage.postImage',
      ['size' => 'medium'])
    @endcomponent
  
  </div>
  
  <div class="mediumBlogPost__content">
    
    <div class="mediumBlogPost__title">
      
      @component('site.components.blogPost.postPartials.postTitle.postTitle',
        ['size' => 'medium'])
        @slot('title')
          {{ $post->title }}
        @endslot
      @endcomponent
    
    </div>
    
    <div class="mediumBlogPost__separator">
      
      @component('site.components.blogPost.postPartials.postSeparator.postSeparator')
      @endcomponent
    
    </div>
    
    <div class="mediumBlogPost__statsBox">
      
      @component('site.components.blogPost.postPartials.postStatItem.postStatItem',
        ['svgId' => 'comment'])
        @slot('text')
          {{ $post->comments_count }} comments
        @endslot
      @endcomponent
    
    </div>
    
    <div class="mediumBlogPost__body">
      
      @component('site.components.blogPost.postPartials.postBody.postBody')
        @slot('body')
          {{ trimString($post->body, 500) }}
        @endslot
      @endcomponent
    
    </div>
    
    <div class="mediumBlogPost__button">
      <a href="#"
         class="btn btn-outline-danger">
        read more
      </a>
    </div>
  
  </div>

</div>