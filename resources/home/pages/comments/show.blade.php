@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('showComment', $comment) }}
      </div>
      <div class="homePage__title">
        <h2>Comment for post "{{ $comment->post->title }}"
          by {{ $comment->author_name }}</h2>
      </div>
      
      @if(!$comment->approved)
        <div class="commentsPage__approveBox">
          <form action="{{ route('comments.approve', $comment->id) }}"
                method="POST">
            {{ csrf_field() }}
            <button type="submit"
                    class="btn btn-warning btn-block">Approve comment
            </button>
          </form>
        </div>
      @endif
      
      <hr>
      <div class="homePage__content">
        <div class="commentsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              {{ $comment->body }}
            
            </div>
            <br>
            <div class="col-md-12">
              <div class="commentsPage__controls">
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
      </div>
    </div>
  </div>
@endsection