<template>
	<div>
		<div id="Maps" class="map"></div>
	</div>
</template>

<script>
	export default{
          mounted(){
          	       this.initMap(); 
          },
          methods:{
          	initMap(){
          		var Location = {lat: 29.979235 , lng:31.134202 };
                var map = new google.maps.Map(document.getElementById("Maps"),{
                	zoom:4,
                	center:Location
          	});
                var Marker = new google.maps.Marker({
                  position:Location,
                  map:map
                })
          },
         
	}
          }
</script>
<style>
  .map{
    height: 222px;
    width: 460px;
    margin-top: -27px;
  }
</style>