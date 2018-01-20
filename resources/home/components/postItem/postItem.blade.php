<div class="postItem">
  
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">
        {{ $post->title }}
      </h4>
      
      <div class="postItem__category">
        @if(isset($post->category))
          <a href="{{ route('posts.index', ['category' => $post->category->id]) }}">
            {{ $post->category->title }}
          </a>
        @else
          Without category
        @endif
      </div>
      
      <div class="postItem__tags">
        @forelse($post->tags as $tag)
          <a href="{{ route('posts.index', ['tag' => $tag->id]) }}"
             class="badge badge-pill badge-primary">
            {{ $tag->title }}
          </a>
        @empty
        @endforelse
      </div>
      
      @isset($post->thumbnail_path)
        <div class="postItem__thumbnail">
          <img src="{{ Storage::url($post->thumbnail_path) }}"
               alt="Post thumbnail">
        </div>
      @endisset
      
      <div class="postItem__comments">
        @if($post->comments_count > 0)
          <a href="{{ route('comments.index') . "?post={$post->id}" }}">
            Comments ({{ $post->comments_count }})
          </a>
        @else
          <span>No comments</span>
        @endif
      </div>
      
      <div class="postItem__controls">
        <a href="{{ route('posts.show', $post->id) }}"
           class="btn btn-primary">
          Read
        </a>
        <a href="{{ route('posts.edit', $post->id) }}"
           class="btn btn-success">
          Edit
        </a>
        <form action="{{ route('posts.destroy', $post->id) }}"
              class="postItem__deleteForm"
              method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button type="submit"
                  class="btn btn-danger">
            Delete
          </button>
        </form>
      </div>
    
    </div>
  </div>

</div>