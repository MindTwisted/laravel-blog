<div class="categoryItem">
  
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">
        {{ $category->title }}
      </h4>
      
      @if($category->posts_count > 0)
        <a href="{{ route('posts.filter') . "?category={$category->id}" }}">
          Show posts ({{ $category->posts_count }})
        </a>
      @else
        <span>No posts</span>
      @endif
      
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