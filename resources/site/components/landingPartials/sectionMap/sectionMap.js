let map;

function initMap() {
    // Set coordinates
    const newYork = {lat: 40.768021, lng: -73.970286};

    // Init map in predefined coordinates
    let mapContainer = document.getElementById('sectionMap__map');

    if (mapContainer) {
        map = new google.maps.Map(mapContainer, {
            center: newYork,
            zoom: 13,
            disableDefaultUI: true
        });

        // Put marker with custom icon into map
        let marker = new google.maps.Marker({
            position: newYork,
            map: map,
            icon: '/images/landing/map-marker.png',
            title: '65th St Transverse, New York'
        });

        // Define map info window content
        let contentString =
            `
            <div class="sectionMap__infoWindow">
              <div class="sectionMap__infoWindowTitle">
                New York
              </div>
              <div class="sectionMap__infoWindowBody">
                65th St Transverse
              </div>     
            </div>
        `;

        // Init info window with provided content
        let infoWindow = new google.maps.InfoWindow({
            content: contentString
        });

        // Open info windows when click event occurs on map marker
        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    }
}

export default initMap;
