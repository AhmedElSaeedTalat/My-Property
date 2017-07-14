<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">

		<link rel="stylesheet" href="css/new.css">
<link rel="stylesheet" href="css/app.css">

	<title> My Propery </title>
	<style>
		[v-cloak]{
			display: none;
		}

	</style>
</head>
<body>
<div id="app" v-cloak>

<router-view>{{csrf_field()}}</router-view>
{{-- <img src="storage/Untitled-1.jpg" alt="">
 --}}</div>


    {{-- AIzaSyBsrmPSrd760dGpVBThzMRRDq8_QklloG8 --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsrmPSrd760dGpVBThzMRRDq8_QklloG8&callback=initMap"
    async defer></script>
    	<script src="js/app.js"></script>



{{-- content_copy --}}

</body>
</html>