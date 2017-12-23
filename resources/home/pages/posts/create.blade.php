@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('addPost') }}
      </div>
      <div class="homePage__title">
        <h2>Add Post</h2>
      </div>
      <div class="homePage__content">
        <div class="postsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('posts.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="categoriesSelect">Category</label>
                  <select class="form-control"
                          name="category"
                          id="categoriesSelect">
                    <option value="">Choose category ...</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}"
                          {{ old('category') == $category->id ?
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
                          {{ old('tags') &&
                           in_array($tag->id, old('tags')) ?
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
                  <label for="postTitle">Post title</label>
                  <input type="text"
                         class="form-control"
                         id="postTitle"
                         name="title"
                         value="{{ old('title') }}">
                </div>
                
                <div class="form-group">
                  <label for="postBody">Post body</label>
                  <textarea class="form-control homePage__mdAreaEditor"
                            id="postBody"
                            name="body"
                            rows="3">{{ old('body') }}</textarea>
                </div>
                <button type="submit"
                        class="btn btn-primary">
                  Add post
                </button>
              
              </form>
            
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
@endsection