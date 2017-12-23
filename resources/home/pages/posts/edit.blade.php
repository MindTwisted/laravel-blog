@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('editPost', $post) }}
      </div>
      <div class="homePage__title">
        <h2>Edit Post</h2>
      </div>
      <div class="homePage__content">
        <div class="postsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('posts.update', $post->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                
                <input type="hidden"
                       name="id"
                       value="{{ $post->id }}">
                
                <div class="form-group">
                  <label for="postsSelect">Category</label>
                  <select class="form-control"
                          name="category"
                          id="categoriesSelect">
                    <option value="">Choose category ...</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}"
                          {{ isset($post->category->id) &&
                             $post->category->id == $category->id ?
                              'selected' : '' }}>
                        {{ $category->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="tagsSelect">Tags</label>
                  <select name="tags[]"
                          id="tagsSelect"
                          class="form-control postsPage__tagsMultiSelect"
                          multiple="multiple">
                    @foreach($tags as $tag)
                      <option value="{{ $tag->id }}"
                          {{ $post->has('tags') &&
                           $post->tags->pluck('id')->contains($tag->id) ?
                           'selected' :
                           '' }}>
                        {{ $tag->title }}
                      </option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="postImage">Post image</label>
                  <input type="file"
                         name="image"
                         class="form-control-file"
                         id="postImage">
                </div>
                
                <div class="form-group">
                  @if($post->image_path)
                    <button class="btn btn-danger postsPage__deleteImage"
                            data-post-id="{{ $post->id }}">
                      Delete image
                    </button>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="postTitle">Post title</label>
                  <input type="text"
                         class="form-control"
                         id="postTitle"
                         name="title"
                         value="{{ $post->title }}">
                </div>
                
                <div class="form-group">
                  <label for="postBody">Post body</label>
                  <textarea class="form-control homePage__mdAreaEditor"
                            id="postBody"
                            name="body"
                            rows="3">{{ $post->body }}</textarea>
                </div>
                <button type="submit"
                        class="btn btn-primary">
                  Edit post
                </button>
              
              </form>
            
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
@endsection