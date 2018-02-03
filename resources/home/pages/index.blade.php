@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__title">
        <h1>Blog stats</h1>
      </div>
      
      <div class="row">
        
        <div class="col-md-6">
          
          <div class="card">
            <canvas class="homePage__postPerDateChart"
                    data-url="{{ route('stats.post-per-date') }}"></canvas>
          </div>
        
        </div>
        
        <div class="col-md-6">
          
          <div class="card">
            <canvas class="homePage__postPerCategoryChart"
                    data-url="{{ route('stats.post-category') }}"></canvas>
          </div>
        
        </div>
      
      </div>
    
    </div>
  </div>
@endsection
