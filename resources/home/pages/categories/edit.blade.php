@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('editCategory', $category) }}
      </div>
      <div class="homePage__title">
        <h1>Edit Category</h1>
      </div>
      <div class="homePage__content">
        <div class="categoriesPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <form action="{{ route('categories.update', $category->id) }}"
                    method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                
                <input type="hidden"
                       name="id"
                       value="{{ $category->id }}">
                
                <div class="form-group">
                  <label for="categoryTitle">Category title</label>
                  <input type="text"
                         id="categoryTitle"
                         name="title"
                         value="{{ $category->title }}"
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