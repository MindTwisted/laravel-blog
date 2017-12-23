<div class="commentItem">
  
  <div class="card">
    <div class="card-body">
      @if(!$comment->approved)
        <div class="commentItem__approveBox">
          <form action="{{ route('comments.approve', $comment->id) }}"
                method="POST">
            {{ csrf_field() }}
            <button type="submit"
                    class="btn btn-warning btn-block">Approve comment
            </button>
          </form>
        </div>
      @endif
      <h4 class="card-title">
        {{ $comment->author_name }}
        <small>{{ $comment->author_email }}</small>
      </h4>
      <p>Post:
        <a href="{{ route('posts.show', $comment->post->id) }}">
          {{ $comment->post->title }}
        </a>
      </p>
      <div class="commentItem__controls">
        <a href="{{ route('comments.show', $comment->id) }}"
           class="btn btn-primary">
          Read
        </a>
        <a href="{{ route('comments.edit', $comment->id) }}"
           class="btn btn-success">
          Edit
        </a>
        <form action="{{ route('comments.destroy', $comment->id) }}"
              method="POST"
              class="commentItem__deleteForm">
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