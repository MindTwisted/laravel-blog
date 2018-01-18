<div class="mainFooter">
  
  <div class="container mainFooter__container">
    <div class="row align-items-center">
      <div class="col-md-4 order-md-2">
        
        @component('site.components.logo.logo')
        @endcomponent
      
      </div>
      <div class="col-md-4 order-md-1">
        
        <div class="mainFooter__socialIcons">
          
          <a href="#"
             class="mainFooter__socialLink">
            @component('site.components.svgSprites.svgIcon', ['id' => 'facebook'])
            @endcomponent
          </a>
          
          <a href="#"
             class="mainFooter__socialLink">
            @component('site.components.svgSprites.svgIcon', ['id' => 'twitter'])
            @endcomponent
          </a>
          
          <a href="#"
             class="mainFooter__socialLink">
            @component('site.components.svgSprites.svgIcon', ['id' => 'linkedin'])
            @endcomponent
          </a>
          
          <a href="#"
             class="mainFooter__socialLink">
            @component('site.components.svgSprites.svgIcon', ['id' => 'google'])
            @endcomponent
          </a>
          
          <a href="#"
             class="mainFooter__socialLink">
            @component('site.components.svgSprites.svgIcon', ['id' => 'instagram'])
            @endcomponent
          </a>
        
        </div>
      
      </div>
      <div class="col-md-4 order-md-3">
        
        <div class="mainFooter__copyright">
          © Copyright {{ date('Y') }}, design by dingo_design
        </div>
      
      </div>
    </div>
    
    <a href="#app"
       class="mainFooter__scrollTop slowScroll">
      @component('site.components.svgSprites.svgIcon', ['id' => 'angle-up'])
      @endcomponent
    </a>
  </div>

</div>