@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('categories') }}
      </div>
      <div class="homePage__title">
        <h1>Categories</h1>
        <div class="homePage__addResourceButton">
          @component('home.components.addResourceButton.addResourceButton',
                      ['resource' => 'categories'])
          @endcomponent
        </div>
      </div>
      <div class="homePage__content">
        <div class="categoriesPage">
          
          <div class="row">
            
            @forelse($categories as $category)
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="categoriesPage__categories">
                  @component('home.components.categoryItem.categoryItem',
                              compact('category'))
                  @endcomponent
                </div>
              </div>
            @empty
              <div class="col-md-12">
                <div class="homePage__emptyQuery">
                  There are no results
                </div>
              </div>
            @endforelse
          
          </div>
        
        </div>
      </div>
    </div>
  </div>
@endsection
