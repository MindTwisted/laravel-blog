@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('addCategory') }}
      </div>
      <div class="homePage__title">
        <h1>Add Category</h1>
      </div>
      <div class="homePage__content">
        <div class="categoriesPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('categories.store') }}"
                    method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="categoryTitle">Category title</label>
                  <input type="text"
                         id="categoryTitle"
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