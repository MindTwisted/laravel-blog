@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__breadcrumbs">
        {{ Breadcrumbs::render('comments') }}
      </div>
      <div class="homePage__title">
        <h1>Comments</h1>
        <div class="homePage__addResourceButton">
          @component('home.components.addResourceButton.addResourceButton',
                      ['resource' => 'comments'])
          @endcomponent
        </div>
      </div>
      <div class="homePage__content">
        <div class="commentsPage">
          
          <div class="row">
            <div class="col-md-12">
              
              <div class="commentsPage__filterPanel">
                @component('home.components.commentsFilterPanel.commentsFilterPanel',
                  ['totalComments' => $comments->total(), 'filters' => $filters])
                @endcomponent
              </div>
            
            </div>
          </div>
          
          <div class="row">
            
            @forelse($comments as $comment)
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="commentsPage__comments">
                  @component('home.components.commentItem.commentItem',
                              compact('comment'))
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
        
        @if(method_exists($comments, 'links'))
          <div class="row">
            <div class="col-md-12">
              <div class="homePage__pagination">
                {{ $comments->appends($filters)->links('views.vendor.pagination.bootstrap-4') }}
              </div>
            </div>
          </div>
        @endif
      
      </div>
    </div>
  </div>
@endsection