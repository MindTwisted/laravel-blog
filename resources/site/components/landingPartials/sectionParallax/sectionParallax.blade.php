<div class="sectionParallax"
     data-parallax="scroll"
     data-image-src="/images/landing/sectionParallax_bg.jpg">
  
  @component('site.components.skewedLine.skewedLine', ['vPosition' => 'top', 'hPosition' => 'right'])
  @endcomponent
  
  <div class="sectionParallax__content">
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          @component('site.components.landingPartials.sectionHeading.sectionHeading',
            ['centered' => true, 'light' => true])
            @slot('title')
              Parallax Section
            @endslot
            @slot('description')
              Exploring the unexplored is a risky business, but a rewarding one.
            @endslot
          @endcomponent
        
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 offset-md-1">
          
          <div class="sectionParallax__quote">
            <div class="sectionParallax__quoteText">
              Design is in everything we make, but it's also between those things.<br>
              It's a mix of craft, science, storytelling, propaganda, and philosophy.
            </div>
            <div class="sectionParallax__quoteAuthor">
              Erik Adigard
            </div>
          </div>
        
        </div>
      </div>
    </div>
  
  </div>
</div>