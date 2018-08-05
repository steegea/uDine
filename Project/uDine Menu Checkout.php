<?php
   include('session.php');
?>

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

<hr>
<Center><h1><img src = "Images/uDine Logo.jpg" alt = "logo" /></h1></Center>
<hr>
<div class="tab">
	<button onclick="window.location.href='uDine Home.html'">Home</button>
	<button onclick="window.location.href='uDine Menu.html'" class = "active">Menu</button>
	<button onclick="window.location.href='uDine Login.php'">Login</button>
	<button onclick="window.location.href='uDine About.html'">About</button>
</div>



			
			<!--Menu -->
			<h1 style="font-family:verdana;">Checkout</h1>
	<div id="CheckoutDisplay">
	
	</div>
	
	<br/>
	<button class = "MenuButtons" id = "ConfirmOrderButton" type="button" onClick="CheckoutButton()">Place Order</button>


	<script type="text/javascript">
	
	DisplayCheckout();
	
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
