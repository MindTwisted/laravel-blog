<div class="sectionAbout"
     id="sectionAbout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        @component('site.components.landingPartials.sectionHeading.sectionHeading')
          @slot('title')
            About Us
          @endslot
          @slot('description')
            This is who we are - or at least who we strive to be...
          @endslot
        @endcomponent
      
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-6">
        
        <div class="sectionAbout__quote">
          <p class="sectionAbout__quoteText">
            If you can't explain it simply, you don't understand it well enough.
          </p>
          <div class="sectionAbout__quoteButton">
            <a href="#"
               class="btn btn-danger">
              the more you know
              @component('site.components.svgSprites.svgIcon', ['id' => 'arrow-right'])
              @endcomponent
            </a>
          </div>
        </div>
      
      </div>
      <div class="col-xl-3 col-lg-6">
        
        <div class="sectionAbout__item">
          <div class="sectionAbout__innerWrap">
            @component('site.components.skewedLine.skewedLine', ['vPosition' => 'top', 'hPosition' => 'right'])
            @endcomponent
            
            <div class="sectionAbout__itemTitle">
              @component('site.components.svgSprites.svgIcon', ['id' => 'paragraph'])
              @endcomponent
              TYPOGRAPHY
            </div>
            <div class="sectionAbout__itemBody">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at, voluptatem similique tempora
              voluptate quia in ea minima earum consequatur eveniet, praesentium illum error
            </div>
          </div>
        </div>
      
      </div>
      <div class="col-xl-3 col-lg-6">
        
        <div class="sectionAbout__item">
          <div class="sectionAbout__innerWrap">
            @component('site.components.skewedLine.skewedLine', ['vPosition' => 'top', 'hPosition' => 'right'])
            @endcomponent
            
            <div class="sectionAbout__itemTitle">
              @component('site.components.svgSprites.svgIcon', ['id' => 'vector'])
              @endcomponent
              FULL ICON SET
            </div>
            <div class="sectionAbout__itemBody">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at, voluptatem similique tempora
              voluptate quia in ea minima earum consequatur eveniet, praesentium illum error
            </div>
          </div>
        </div>
      
      </div>
      <div class="col-xl-3 col-lg-6">
        
        <div class="sectionAbout__item">
          <div class="sectionAbout__innerWrap">
            @component('site.components.skewedLine.skewedLine', ['vPosition' => 'top', 'hPosition' => 'right'])
            @endcomponent
            
            <div class="sectionAbout__itemTitle">
              @component('site.components.svgSprites.svgIcon', ['id' => 'ruler-alt-2'])
              @endcomponent
              ACCURATE
            </div>
            <div class="sectionAbout__itemBody">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at, voluptatem similique tempora
              voluptate quia in ea minima earum consequatur eveniet, praesentium illum error
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</div>