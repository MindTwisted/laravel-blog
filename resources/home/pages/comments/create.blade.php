@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('addComment') }}
      </div>
      <div class="homePage__title">
        <h2>Add Comment</h2>
      </div>
      <div class="homePage__content">
        <div class="commentsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('comments.store') }}"
                    method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="postsSelect">Post</label>
                  <select class="form-control"
                          name="post"
                          id="postsSelect">
                    <option value="">Choose post ...</option>
                    @foreach ($posts as $post)
                      <option value="{{ $post->id }}"
                          {{ old('post') == $post->id ?
                              'selected' : '' }}>
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
                         value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label for="authorEmail">Email</label>
                  <input type="email"
                         class="form-control"
                         id="authorEmail"
                         name="author_email"
                         value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label for="commentBody">Your comment</label>
                  <textarea class="form-control commentsPage__commentBody"
                            id="commentBody"
                            name="body">{{ old('body') }}</textarea>
                </div>
                <button type="submit"
                        class="btn btn-primary">
                  Add comment
                </button>
              
              </form>
            
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
@endsection