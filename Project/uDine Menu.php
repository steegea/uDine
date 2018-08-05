<!DOCTYPE html>
<html>
  <head>
	<script type="text/javascript" src="LoadTxt.js"></script>
    <meta charset="utf-8">
    <title></title>
    <link rel="shortcut icon" type="image/png" href="static/pics/favicon.ico">
	<link rel = "stylesheet" href="http://localhost:8080/udine/uDine.css">

  </head>
  <body>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<Center><h1><img src = "Images/uDine Logo.jpg" alt = "logo" />	  
</h1></Center>
<hr>

<div class="tab">
	<button onclick="window.location.href='uDine Home.html'">Home</button>
	<button onclick="window.location.href='uDine Menu.html'" class = "active">Menu</button>
	<button onclick="window.location.href='uDine Login.php'">Login</button>
	<button onclick="window.location.href='uDine About.html'">About</button>
</div>



			
			<!--Menu -->
	<script type="text/javascript">
	  window.onload = function()
	  {
	  var d = new Date();
	  var apm = "AM";
	  if (d.getHours() >12){var h = d.getHours()-12; apm = "PM"; } 
	  var m = d.getMinutes();
		
	  if(h<=10&&apm=="AM"){B.scrollIntoView(true);}
	  if(((h==11||h==12)&&apm=="AM")||((h<=3)&&apm=="PM")){L.scrollIntoView(true);}
	  if(h>3 && apm=="PM"){D.scrollIntoView(true);}

	  }	
	</script>

	<form name = "order">
	
	<h1 id="B" style="font-family:verdana;">Breakfast</h1>
	<div id="Breakfast">
	
	</div>
	<hr>
	
	<h1 id="L" style="font-family:verdana;">Lunch</h1>
	<div id="Lunch">

	</div>
	<hr>
	
	<h1 id="D" style="font-family:verdana;">Dinner</h1>
	<div id="Dinner">
		
	</div>
	
	<button class="MenuButtons" id = "AddToCartButton" type="button" onClick="doSubmit()">Add to Cart</button>
	<button class="MenuButtons" id = "ClearButton" type="button" onClick="doClear()">Clear</button>
	
	</form>
	
	<h3><div id="Cart">
	
	</div></h3>
	
	<script type="text/javascript">
	
		readText("./Json/Cat.txt","./Json/Item.txt");
		
	</script>
			
			
		
   		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="footer">
					<ul class="menu">
						&copy; uDine 2018. All rights reserved.
					</ul>
				</div>
			</footer>
	</body>
		<!-- Scripts -->
			<script src="static/js/jquery.min.js"></script>
			<script src="static/js/jquery.scrollex.min.js"></script>
			<script src="static/js/jquery.scrolly.min.js"></script>
			<script src="static/js/skel.min.js"></script>
			<script src="static/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="static/js/main.js"></script>



  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</html>
