<div class="sectionBlog"
     id="sectionBlog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        @component('site.components.landingPartials.sectionHeading.sectionHeading',
          ['centered' => true])
          @slot('title')
            Latest Blog Posts
          @endslot
          @slot('description')
            Information is a source of learning. But unless it is organized, processed,<br>
            and available to the right people in a format for decision making, it is a burden, not a benefit.
          @endslot
        @endcomponent
        
        @if(count($posts) > 0)
          
          <div class="sectionBlog__carousel owl-carousel">
            @foreach($posts as $post)
              <div class="sectionBlog__carouselItem">
                @component('site.components.blogPost.smallBlogPost.smallBlogPost', compact('post'))
                @endcomponent
              </div>
            @endforeach
          </div>
        @else
          <p class="sectionBlog__empty">There is no posts yet</p>
        @endif
        
        <div class="sectionBlog__viewBlogButton">
          
          <a href="{{ route('pages.blog') }}"
             class="btn btn-outline-danger">
            view blog
          </a>
          
        </div>
      
      </div>
    </div>
  </div>
</div>