<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <div id="Maps" class="map"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsrmPSrd760dGpVBThzMRRDq8_QklloG8&callback=initMap"
    async defer></script>
    <script>
    function  initMap(){
              var Location = {lat: 29.979235 , lng:31.134202 };
                var map = new google.maps.Map(document.getElementById("Maps"),{
                  zoom:4,
                  center:Location
            });
                var Marker = new google.maps.Marker({
                  position:Location,
                  map:map
                })
              }
    </script>
</body>
</html>
