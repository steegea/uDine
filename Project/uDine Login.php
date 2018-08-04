<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="shortcut icon" type="image/png" href="static/pics/favicon.ico">
	<link rel = "stylesheet" href="http://localhost:8080/udine/uDine.css">

	<link href="http://localhost:8080///netdna.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<script src="http://localhost:8080///netdna.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  
  <body>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<hr>
<Center><h1><img src = "Images/uDine Logo.jpg" alt = "logo" /></h1></Center>
<hr>
<div class="tab">
	<button onclick="window.location.href='uDine Home.html'">Home</button>
	<button onclick="window.location.href='uDine Menu.html'">Menu</button>
	<button onclick="window.location.href='uDine Login.php'" class = "active">Login</button>
	<button onclick="window.location.href='uDine About.html'">About</button>
</div>

                         
<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" align="center">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign in to your uDine account</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-45px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                          
							<div></div>
							
							<div style="margin-bottom: 25px; margin-left: 30%;" class="input-group">
								   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								   <label for="inputEmail">Email:</label>
								   <input type="email" name="email" pattern = ".+.edu" class="form-control" id="inputEmail" placeholder="Email Address" required>
							   </div>
						       
							<center>
								   <div style="margin-bottom: 25px; margin-left: 30%;" class="input-group">
									   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									   <label for="inputPassword">Password:</label>
									   <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
								   </div>
							</center>						
                          
								<div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
									
									<button type ="submit" class="AccountButtons" id = "loginButton">Login</button>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account? 
                                        <b><a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign-up
                                        </a></b>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
		

		

<div class="container">
	
	<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md- col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <center><div class="panel-title">Sign up for a uDine account</div></center>
                            <div style="float:right; font-size: 85%; position: relative; top:-45px"><b><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></b></div>
							
                        </div>   

                    <div style="padding-top:30px;" class="panel-body">

                        <div style="display:none" id="signup-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="uDine Login.php" method="post">
                            
								<div></div>
								
								<div style="margin-bottom: 25px; margin-left: 34%;" class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<label for="inputFirstName">First Name:</label>
									<input type="text" name="firstname" pattern="[A-Za-z]+" id = "inputFirstName" class="form-control" placeholder="First Name" required>
										
											
								</div>
							
						
                           
							   <div style="margin-bottom: 25px; margin-left: 34%;" class="input-group">
								   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								   <label for="inputLastName">Last Name:</label>
								   <input type="text" name="lastname" pattern="[A-Za-z]+" class="form-control" id="inputLastName" placeholder="Last Name" required>
							   </div>
						   
						   
						   
							   <div style="margin-bottom: 25px; margin-left: 34%;" class="input-group">
								   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								   <label for="inputEmail">Email:</label>
								   <input type="email" name="email" pattern = ".+.edu" class="form-control" id="inputEmail" placeholder="Email Address" required>
							   </div>
						       
							<center>
								   <div style="margin-bottom: 25px" class="input-group">
									   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									   <label for="inputPassword">Password:</label>
									   <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
								   </div>
							</center>
						 
						   
						    <center>
							   <div style="margin-bottom: 25px" class="input-group">
								   <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								   <label for="inputCollege">College:</label>
								   <input type="text" name="college" pattern="[A-Za-z]+" class="form-control" id="inputcollege" placeholder="Name of College" required>
							   </div>
						    </center>
						   
							<center>
								<div style="margin-top:10px" class="form-group">
									<button type ="submit" name = "signupsubmit" class="AccountButtons" id = "signupButton">Sign-up</button>
								</div>
							</center>


                                
                            </form>     
						
						</div>                     
                    </div>  
		</div>

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
			<script src="http://localhost:8080/static/js/jquery.min.js"></script>
			<script src="http://localhost:8080/static/js/jquery.scrollex.min.js"></script>
			<script src="http://localhost:8080/static/js/jquery.scrolly.min.js"></script>
			<script src="http://localhost:8080/static/js/skel.min.js"></script>
			<script src="http://localhost:8080/static/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="http://localhost:8080/static/js/main.js"></script>



  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  <?php
	//Establishing Connection with Server
	$connection = mysqli_connect("localhost", "root", "wit123", "udine");
	
	$db_table = "users";

	//Selecting Database from Server
	//$db = mysql_select_db("colleges", $connection);
	
	
	if(isset($_POST['signupsubmit']))
	{
   
		//Fetching variables of the form which travels in URL
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = password_hash($password, PASSWORD_DEFAULT);
		$college = $_POST['college'];
		
		if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($college)){
		//Insert Query of SQL
		
		$sql = "INSERT INTO ". $db_table. " (FirstName, LastName, Email, Password, College)
			VALUES('$firstname', '$lastname', '$email', '$password', '$college')";
		$query = mysqli_query($connection, $sql);
		echo "<br/><br/><span>Data Inserted successfully...!!</span>";
		}
		else{
		echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";   
		}
 
	}
	//Closing Connection with Server
	mysqli_close($connection);
?>				

</html>


