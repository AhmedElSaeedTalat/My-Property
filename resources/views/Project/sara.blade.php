<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<video id="xx" controls height="300px" width="300px">
			<source src="property.mp4" type="video/mp4" media="" >
		</video>
				      <button onclick="changeIt">chnage</button>
				       <button onclick="playIt">play</button>
		


		     <script>
				       let x = document.getElementById("xx");
				       	function playIt(){
                                 x.play();
				       	}
				       </script>		  
</body>
</html>