
// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: $lat, lng: $lng };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("mapa"), {
      zoom: 15,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }

  window.initMap = initMap;
