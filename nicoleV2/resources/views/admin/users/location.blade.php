        <div id="mapa" style="display:block"></div>
        <link rel="stylesheet" type="text/css" href="{{asset('css/map.css')}}" />
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="{{asset('js/map.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly" async></script>


<script>
    var lati = "<?php echo $lat ?>";
    var longi = "<?php echo $lng ?>";
    function initMap() {
    // The location of Uluru
    const uluru = { lat: Number(lati), lng: Number(longi) };
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
</script>
