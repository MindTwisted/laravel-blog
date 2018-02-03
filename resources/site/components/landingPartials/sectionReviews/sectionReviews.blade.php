<div class="sectionReviews"
     style="background-image: url('images/landing/sectionReviews_bg.jpg')">
  
  @component('site.components.skewedLine.skewedLine',
    ['vPosition' => 'bottom', 'hPosition' => 'left'])
  @endcomponent
  
  <div class="sectionReviews__content">
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          @component('site.components.landingPartials.sectionHeading.sectionHeading',
            ['centered' => true, 'light' => true])
            @slot('title')
              And what do others say?
            @endslot
          @endcomponent
        
        </div>
      </div>
      <div class="row align-items-end">
        <div class="col-lg-6">
          
          <div class="sectionReviews__feedback">
            <img src="images/landing/folder.png"
                 alt="Folder Icon"
                 class="sectionReviews__folder">
            
            <div class="sectionReviews__feedbackInnerWrap">
              
              <div class="sectionReviews__carousel owl-carousel">
                
                <div class="sectionReviews__carouselItem">
                  <div class="sectionReviews__feedbackAuthor">
                    Astrid Jorgensen
                  </div>
                  <div class="sectionReviews__feedbackPosition">
                    CEO at Runway inc.
                  </div>
                  <div class="sectionReviews__feedbackContent">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at, voluptatem similique tempora
                    voluptate quia in ea minima earum consequatur
                  </div>
                </div>
                <div class="sectionReviews__carouselItem">
                  <div class="sectionReviews__feedbackAuthor">
                    John Lorem
                  </div>
                  <div class="sectionReviews__feedbackPosition">
                    Team lead at Google inc.
                  </div>
                  <div class="sectionReviews__feedbackContent">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at, voluptatem similique tempora
                    voluptate quia in ea minima earum consequatur
                  </div>
                </div>
                <div class="sectionReviews__carouselItem">
                  <div class="sectionReviews__feedbackAuthor">
                    Peter Johnson
                  </div>
                  <div class="sectionReviews__feedbackPosition">
                    Client of the year
                  </div>
                  <div class="sectionReviews__feedbackContent">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at, voluptatem similique tempora
                    voluptate quia in ea minima earum consequatur
                  </div>
                </div>
              
              </div>
            
            </div>
          </div>
        
        </div>
        <div class="col-lg-6">
          
          <div class="sectionReviews__accordion">
            
            <div id="sectionReviews__accordion">
              
              <div class="sectionReviews__accordionItem">
                
                <div class="sectionReviews__accordionItemTogglerOuterWrap">
                  <a data-toggle="collapse"
                     href="#sectionReviews__accordionItem_1"
                     role="button"
                     class="sectionReviews__accordionItemToggler"
                     aria-expanded="true"
                     aria-controls="sectionReviews__accordionItem_1">
                    @component('site.components.svgSprites.svgIcon', ['id' => 'angle-down'])
                    @endcomponent
                    <span>Lorem ipsum dolor.</span>
                  </a>
                </div>
                
                <div id="sectionReviews__accordionItem_1"
                     class="collapse show sectionReviews__accordionItemBody"
                     data-parent="#sectionReviews__accordion"
                     role="tabpanel">
                  <p class="mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime perferendis voluptatum maiores quos
                    sit unde labore sed ratione ut fugiat veniam, tempora, aliquam, tenetur in vero. Suscipit quod
                    deleniti dolor. Ex quo reiciendis consectetur magnam sed neque aut pariatur, iusto harum impedit.
                    Harum vitae asperiores expedita excepturi deserunt eos aspernatur omnis. In, repudiandae aliquam
                    assumenda. Qui consequatur culpa, praesentium amet dolore dignissimos quam eum! Illum mollitia et
                    maiores unde. Amet!
                  </p>
                </div>
              
              </div>
              
              <div class="sectionReviews__accordionItem">
                
                <div class="sectionReviews__accordionItemTogglerOuterWrap">
                  <a data-toggle="collapse"
                     href="#sectionReviews__accordionItem_2"
                     role="button"
                     class="sectionReviews__accordionItemToggler"
                     aria-expanded="true"
                     aria-controls="sectionReviews__accordionItem_2">
                    @component('site.components.svgSprites.svgIcon', ['id' => 'angle-down'])
                    @endcomponent
                    <span>Lorem ipsum.</span>
                  </a>
                </div>
                
                <div id="sectionReviews__accordionItem_2"
                     class="collapse sectionReviews__accordionItemBody"
                     data-parent="#sectionReviews__accordion"
                     role="tabpanel">
                  <p class="mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime perferendis voluptatum maiores quos
                    sit unde labore sed ratione ut fugiat veniam, tempora, aliquam, tenetur in vero. Suscipit quod
                    deleniti dolor. Ex quo reiciendis consectetur magnam sed neque aut pariatur, iusto harum impedit.
                    Harum vitae asperiores expedita excepturi deserunt eos aspernatur omnis. In, repudiandae aliquam
                    assumenda. Qui consequatur culpa, praesentium amet dolore dignissimos quam eum! Illum mollitia et
                    maiores unde. Amet!
                  </p>
                </div>
              
              </div>
              
              <div class="sectionReviews__accordionItem">
                
                <div class="sectionReviews__accordionItemTogglerOuterWrap">
                  <a data-toggle="collapse"
                     href="#sectionReviews__accordionItem_3"
                     role="button"
                     class="sectionReviews__accordionItemToggler"
                     aria-expanded="true"
                     aria-controls="sectionReviews__accordionItem_3">
                    @component('site.components.svgSprites.svgIcon', ['id' => 'angle-down'])
                    @endcomponent
                    <span>Lorem ipsum dolor sit.</span>
                  </a>
                </div>
                
                <div id="sectionReviews__accordionItem_3"
                     class="collapse sectionReviews__accordionItemBody"
                     data-parent="#sectionReviews__accordion"
                     role="tabpanel">
                  <p class="mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime perferendis voluptatum maiores quos
                    sit unde labore sed ratione ut fugiat veniam, tempora, aliquam, tenetur in vero. Suscipit quod
                    deleniti dolor. Ex quo reiciendis consectetur magnam sed neque aut pariatur, iusto harum impedit.
                    Harum vitae asperiores expedita excepturi deserunt eos aspernatur omnis. In, repudiandae aliquam
                    assumenda. Qui consequatur culpa, praesentium amet dolore dignissimos quam eum! Illum mollitia et
                    maiores unde. Amet!
                  </p>
                </div>
              
              </div>
            
            </div>
          
          </div>
        
        </div>
      </div>
    </div>
  
  </div>

</div>