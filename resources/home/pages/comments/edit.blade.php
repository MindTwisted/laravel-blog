@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('editComment', $comment) }}
      </div>
      <div class="homePage__title">
        <h2>Edit Comment</h2>
      </div>
      <div class="homePage__content">
        <div class="commentsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('comments.update', $comment->id) }}"
                    method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="postsSelect">Post</label>
                  <select class="form-control"
                          name="post"
                          id="postsSelect">
                    <option value="">Choose post ...</option>
                    @foreach ($posts as $post)
                      <option value="{{ $post->id }}"
                          {{ $post->id === $comment->post_id ? 'selected' : '' }}>
                        {{ $post->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="authorName">Name</label>
                  <input type="text"
                         class="form-control"
                         id="authorName"
                         name="author_name"
                         value="{{ $comment->author_name }}">
                </div>
                <div class="form-group">
                  <label for="authorEmail">Email</label>
                  <input type="email"
                         class="form-control"
                         id="authorEmail"
                         name="author_email"
                         value="{{ $comment->author_email }}">
                </div>
                <div class="form-group">
                  <label for="commentBody">Your comment</label>
                  <textarea class="form-control commentsPage__commentBody"
                            id="commentBody"
                            name="body">{{ $comment->body }}</textarea>
                </div>
                <button type="submit"
                        class="btn btn-primary">
                  Edit comment
                </button>
              
              </form>
            
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
@endsection