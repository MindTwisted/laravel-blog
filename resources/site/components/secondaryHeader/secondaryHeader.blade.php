<header class="secondaryHeader">
  
  @component('site.components.skewedLine.skewedLine',
    ['vPosition' => 'bottom', 'hPosition' => 'left'])
  @endcomponent
  
  <div class="secondaryHeader__breadcrumbs">
    {{ Breadcrumbs::render($breadcrumbName, isset($post) ? $post : null) }}
  </div>
  
  <div class="secondaryHeader__navbar">
    @component('site.components.secondaryNavbar.secondaryNavbar')
    @endcomponent
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <h1 class="secondaryHeader__title">
          {{ $title }}
        </h1>
      
      </div>
    </div>
  </div>

</header>

