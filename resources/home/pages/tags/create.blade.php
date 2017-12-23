@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('addTag') }}
      </div>
      <div class="homePage__title">
        <h1>Add Tag</h1>
      </div>
      <div class="homePage__content">
        <div class="tagsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('tags.store') }}"
                    method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="tagTitle">Tag title</label>
                  <input type="text"
                         id="tagTitle"
                         name="title"
                         value="{{ old('title') }}"
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