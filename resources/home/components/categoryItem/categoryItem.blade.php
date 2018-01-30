<div class="categoryItem">
  
  <div class="card">
    <div class="card-body">
      <div class="categoryItem__titleWrap">
        
        <h4 class="card-title">
          {{ $category->title }} Lorem ipsum dolor sit amet.
        </h4>
        
        @if($category->posts_count > 0)
          <a href="{{ route('posts.index') . "?category={$category->id}" }}">
            Show posts ({{ $category->posts_count }})
          </a>
        @else
          <span>No posts</span>
        @endif
      
      </div>
      
      <div class="categoryItem__controls">
        <a href="{{ route('categories.edit', $category->id) }}"
           class="btn btn-success">
          Edit
        </a>
        <form action="{{ route('categories.destroy', $category->id) }}"
              method="POST"
              class="categoryItem__deleteForm">
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