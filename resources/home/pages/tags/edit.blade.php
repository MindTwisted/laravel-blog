@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('editTag', $tag) }}
      </div>
      <div class="homePage__title">
        <h1>Edit Tag</h1>
      </div>
      <div class="homePage__content">
        <div class="tagsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('tags.update', $tag->id) }}"
                    method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                
                <input type="hidden"
                       name="id"
                       value="{{ $tag->id }}">
                
                <div class="form-group">
                  <label for="tagTitle">Tag title</label>
                  <input type="text"
                         id="tagTitle"
                         name="title"
                         value="{{ $tag->title }}"
                         class="form-control
                          {{ $errors->has('title') ? 'is-invalid' : '' }}"
                         autofocus>
                </div>
                <button type="submit"
                        class="btn btn-primary">
                  Submit
                </button>
              
              </form>
            
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>
@endsection