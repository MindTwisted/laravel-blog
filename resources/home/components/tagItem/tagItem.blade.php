<div class="tagItem">
  
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">
        {{ $tag->title }}
      </h4>
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