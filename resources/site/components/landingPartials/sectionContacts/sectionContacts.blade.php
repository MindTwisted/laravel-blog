<div class="sectionContacts"
     id="sectionContacts">
  
  <div class="container">
    
    <div class="row">
      <div class="col-md-12">
        
        @component('site.components.landingPartials.sectionHeading.sectionHeading')
          @slot('title')
            Get to know us better
          @endslot
          @slot('description')
            Contact us, and we will contact you back. Want to chat? We can do that too.
          @endslot
        @endcomponent
      
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        
        <div class="sectionContacts__contacts">
          
          <div class="sectionContacts__contactItem">
            <div class="sectionContacts__contactItemIcon">
              @component('site.components.svgSprites.svgIcon', ['id' => 'location-pin'])
              @endcomponent
            </div>
            <div class="sectionContacts__contactItemText">
              623 Fifth Avenue,<br>
              New York, NY 10022,<br>
              USA
            </div>
          </div>
          
          <div class="sectionContacts__contactItem">
            <div class="sectionContacts__contactItemIcon">
              @component('site.components.svgSprites.svgIcon', ['id' => 'email'])
              @endcomponent
            </div>
            <div class="sectionContacts__contactItemText">
              randomness@expire.com
            </div>
          </div>
          
          <div class="sectionContacts__contactItem">
            <div class="sectionContacts__contactItemIcon">
              @component('site.components.svgSprites.svgIcon', ['id' => 'mobile'])
              @endcomponent
            </div>
            <div class="sectionContacts__contactItemText">
              Phone: +(123) 456 7890 <br>
              Fax: +(123) 456 7899
            </div>
          </div>
        
        </div>
      
      </div>
      <div class="col-lg-8">
        
        <form action="{{ route('contact-emails.send') }}"
              method="POST"
              class="sectionContacts__form">
          
          {{ csrf_field() }}
          
          <div class="row">
            
            <div class="col-md">
              <div class="form-group">
                <input type="text"
                       name="name"
                       class="form-control"
                       id="name"
                       required>
                <label for="name">Name</label>
                <div class="invalid-feedback"></div>
              </div>
            </div>
            
            <div class="col-md">
              <div class="form-group">
                <input type="email"
                       name="email"
                       class="form-control"
                       id="email"
                       required>
                <label for="email">Email</label>
                <div class="invalid-feedback"></div>
              </div>
            </div>
          
          </div>
          
          <div class="row">
            
            <div class="col">
              <div class="form-group">
                <input type="text"
                       name="subject"
                       class="form-control"
                       id="subject"
                       required>
                <label for="subject">Subject</label>
                <div class="invalid-feedback"></div>
              </div>
            </div>
          
          </div>
          
          <div class="row">
            
            <div class="col">
              <div class="form-group">
                <textarea name="message"
                          id="message"
                          cols="30"
                          rows="10"
                          class="form-control"
                          required></textarea>
                <label for="message">Message</label>
                <div class="invalid-feedback"></div>
              </div>
            </div>
          
          </div>
          
          <div class="row">
            
            <div class="col">
              <div class="form-group">
                <button type="submit"
                        class="btn btn-outline-danger btn-block">
                  Submit
                </button>
              </div>
            </div>
          
          </div>
        
        </form>
      
      </div>
    </div>
  
  </div>

</div>