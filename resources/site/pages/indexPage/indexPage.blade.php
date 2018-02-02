@extends('site.layouts.master')

@section('title')
  Home
@endsection

@section('content')
  <div class="indexPage">
    @component('site.components.mainNavbar.mainNavbar')
    @endcomponent
    
    @component('site.components.landingPartials.landingHeader.landingHeader')
    @endcomponent
    
    @component('site.components.landingPartials.sectionAbout.sectionAbout')
    @endcomponent
    
    @component('site.components.landingPartials.sectionParallax.sectionParallax')
    @endcomponent
    
    @component('site.components.landingPartials.teaserAchievements.teaserAchievements')
    @endcomponent
    
    @component('site.components.landingPartials.sectionBlog.sectionBlog', compact('posts'))
    @endcomponent
    
    @component('site.components.landingPartials.teaserBrands.teaserBrands')
    @endcomponent
    
    @component('site.components.landingPartials.sectionReviews.sectionReviews')
    @endcomponent
    
    @component('site.components.landingPartials.sectionContacts.sectionContacts')
    @endcomponent
    
    @component('site.components.landingPartials.sectionMap.sectionMap')
    @endcomponent
    
    @component('site.components.mainFooter.mainFooter')
    @endcomponent
  </div>
@endsection

@section('scripts')
  <script>
      var map;

      function initMap() {
          // Set coordinates
          var newYork = {lat: 40.768021, lng: -73.970286};

          // Init map in predefined coordinates
          var mapContainer = document.getElementById('sectionMap__map');

          if (mapContainer) {
              map = new google.maps.Map(mapContainer, {
                  center: newYork,
                  zoom: 13,
                  disableDefaultUI: true
              });

              // Put marker with custom icon into map
              var marker = new google.maps.Marker({
                  position: newYork,
                  map: map,
                  icon: '/images/landing/map-marker.png',
                  title: '65th St Transverse, New York'
              });

              // Define map info window content
              var contentString =
                  '<div class="sectionMap__infoWindow">' +
                  '<div class="sectionMap__infoWindowTitle">' +
                  'New York' +
                  '</div>' +
                  '<div class="sectionMap__infoWindowBody">' +
                  '65th St Transverse' +
                  '</div>' +
                  '</div>';

              // Init info window with provided content
              var infoWindow = new google.maps.InfoWindow({
                  content: contentString
              });

              // Open info windows when click event occurs on map marker
              marker.addListener('click', function () {
                  infoWindow.open(map, marker);
              });
          }
      }
  </script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1s0G5DALQ1_ssXgddOX7T69PxY5_4v4&callback=initMap"
          async
          defer></script>

@endsection
