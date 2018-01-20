@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('showPost', $post) }}
      </div>
      <div class="homePage__title">
        <h2>
          {{ $post->title }}
          <div>
            <small class="postsPage__categoryTitle">
              <em>{{ $post->category->title or '' }}</em>
            </small>
          </div>
        </h2>
      </div>
      <div class="postsPage__tags">
        @forelse($post->tags as $tag)
          <span class="badge badge-pill badge-primary">
            {{ $tag->title }}
          </span>
        @empty
        @endforelse
      </div>
      <div>
        @if($post->has('comments') && count($post->comments) > 0)
          <a href="{{ route('comments.index') . "?post={$post->id}" }}">
            Comments ({{ count($post->comments) }})
          </a>
        @else
          <span>No comments</span>
        @endif
      </div>
      <hr>
      <div class="homePage__content">
        <div class="postsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              @isset($post->image_path)
                <div class="postsPage__image">
                  <img src="{{ Storage::url($post->image_path) }}"
                       alt="Post image">
                </div>
              @endisset
              
              <div class="homePage__mdAreaViewer">
                {{ $post->body }}
              </div>
            
            </div>
            <br>
            <div class="col-md-12">
              <div class="postsPage__controls">
                <a href="{{ route('posts.edit', $post->id) }}"
                   class="btn btn-success">
                  Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}"
                      method="POST"
                      class="postItem__deleteForm">
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