<div class="largeBlogPost">
  
  <div class="largeBlogPost__date">
    
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
  
  <div class="largeBlogPost__content">
    
    <div class="largeBlogPost__title">
      
      @component('site.components.blogPost.postPartials.postTitle.postTitle',
        ['size' => 'large'])
        @slot('title')
          {{ $post->title }}
        @endslot
      @endcomponent
    
    </div>
    
    <div class="largeBlogPost__separator">
      
      @component('site.components.blogPost.postPartials.postSeparator.postSeparator')
      @endcomponent
    
    </div>
    
    <div class="largeBlogPost__statsBox">
      
      @component('site.components.blogPost.postPartials.postStatItem.postStatItem',
        ['svgId' => 'comment'])
        @slot('text')
          {{ $post->comments_count }} comments
        @endslot
      @endcomponent
    
    </div>
    
    <div class="largeBlogPost__image">
      
      @component('site.components.blogPost.postPartials.postImage.postImage',
        ['size' => 'large', 'post' => $post])
      @endcomponent
    
    </div>
    
    <div class="largeBlogPost__body">
      
      <pre class="largeBlogPost__mdRaw"
           style="display: none;">
        {{ $post->body }}
      </pre>
      
      @component('site.components.blogPost.postPartials.postBody.postBody')
        @slot('body')
        @endslot
      @endcomponent
    
    </div>
  
  </div>

</div>

{{--TODO: add styles for blockquotes and etc--}}