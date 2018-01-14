<div class="smallBlogPost">
  <div class="smallBlogPost__imageBox">
    
    {{--TODO: imageBox as separate component and think how to differentiate its height--}}
    
    @component('site.components.skewedLine.skewedLine',
      ['vPosition' => 'top', 'hPosition' => 'right'])
    @endcomponent
    
    @isset($post->thumbnail_path)
      <div class="smallBlogPost__imageCover"
           style="background-image: url('{{ Storage::url($post->thumbnail_path) }}')">
      </div>
    @endisset
  </div>
  
  <div class="smallBlogPost__contentBox">
    
    <div class="smallBlogPost__title">
      {{ $post->title }}
    </div>
    
    @component('site.components.blogPost.postPartials.postSeparator.postSeparator')
    @endcomponent
    
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
      {{ trimString($post->body, 250) }}
    </div>
    <div class="smallBlogPost__button">
      <a href="#"
         class="btn btn-outline-danger">
        read more
      </a>
    </div>
  
  </div>
</div>