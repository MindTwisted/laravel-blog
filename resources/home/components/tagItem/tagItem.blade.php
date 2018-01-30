<div class="tagItem">
  
  <div class="card">
    <div class="card-body">
      <div class="tagItem__titleWrap">
        
        <h4 class="card-title">
          {{ $tag->title }}
        </h4>
        
        @if($tag->posts_count > 0)
          <a href="{{ route('posts.index') . "?tag={$tag->id}" }}">
            Show posts ({{ $tag->posts_count }})
          </a>
        @else
          <span>No posts</span>
        @endif
        
      </div>
      
      <div class="tagItem__controls">
        <a href="{{ route('tags.edit', $tag->id) }}"
           class="btn btn-success">
          Edit
        </a>
        <form action="{{ route('tags.destroy', $tag->id) }}"
              method="POST"
              class="tagItem__deleteForm">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          
          <button class="btn btn-danger">
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>

</div>