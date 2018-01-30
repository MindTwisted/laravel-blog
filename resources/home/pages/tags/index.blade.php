@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('tags') }}
      </div>
      <div class="homePage__title">
        <h1>Tags</h1>
        <div class="homePage__addResourceButton">
          @component('home.components.addResourceButton.addResourceButton',
                      ['resource' => 'tags'])
          @endcomponent
        </div>
      </div>
      <div class="homePage__content">
        <div class="tagsPage">
          
          <div class="row">
            
            @forelse($tags as $tag)
              <div class="col-md-12">
                <div class="tagsPage__tags">
                  @component('home.components.tagItem.tagItem',
                              compact('tag'))
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