<?php

include('session.php');

session_start();
	
	//Initiate a connection to the "udine" database containing a table called "users"
	$connection = mysqli_connect("localhost", "root", "wit123", "udine");
	$db_table = "users";
	
	//Initialize log-in/sign-up messages
	$signup_error = $login_error = $signup_successful = "";
   
   //Checks whether the user has clicked on the login button
   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_Button'])) 
   {
      //Variables that store user's email & password
      $myemail = mysqli_real_escape_string($connection,$_POST['email']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
     
	  //Uses a SQL SELECT statement to verify the user's account credentials (exists in the udine database)
      $sql = "SELECT UserID, 'active' FROM users WHERE Email = '$myemail' and Password = '$mypassword'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      //If the user's email & password matches a record in the database, the user is signed-in
	  if($count == 1) 
	  {
		$_SESSION['login_user'] = $myemail;
         
		header("location: uDine MenuLoggedIn.php");
      }
	  
	  //Otherwise, let the user know their email, password, or both are invalid
	  else 
	  {
		$login_error = "Invalid username and/or password!";
      }
   }
	
	//Checks whether the user has clicked on the signup button
	if(isset($_POST['signup_Button']))
	{
		//Variables that store values held in the account sign-up form fields
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password']; //password_hash($password, PASSWORD_DEFAULT);
		$college = $_POST['college'];
		
		//Checks to see whether all form fields are filled out
		if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($college))
		{
			//Variables that store user's email & password
			$myemail = mysqli_real_escape_string($connection,$_POST['email']);
		    $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
		  
			//SQL SELECT statement that verifies if a user has an account using a specific email
		    $sql = "SELECT UserID, 'active' FROM users WHERE Email = '$myemail'";
		    $result = mysqli_query($connection, $sql);
		    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		    $active = $row['active'];
			$count = mysqli_num_rows($result);
			
			//If the email already exists in the database, display an error message
			//The account is not created (added to the database)
			if($count == 1) 
			{
			 $signup_error = "Error: An account with this email already exists!";
			 
			}
			
			/*
				Otherwise, a SQL INSERT statement is executed which adds the user's first name, last name, email address, password, and college name
				to the database
			*/
			else 
			{
			 $sql = "INSERT INTO ". $db_table. " (FirstName, LastName, Email, Password, College)
			VALUES('$firstname', '$lastname', '$email', '$password', '$college')";
				$query = mysqli_query($connection, $sql);
				
				$signup_successful = "You have successfully created a uDine account!";
			}
		}

	}
		
 
	
	//Closes connection to the database
	mysqli_close($connection);
/*
	//Establishing Connection with Server
	//$connection = mysqli_connect("localhost", "root", "wit123", "udine");
	
	//$db_table = "users";

	//Selecting Database from Server
	//$db = mysql_select_db("colleges", $connection);
	//include("config.php");
	session_start();
	
	$connection = mysqli_connect("localhost", "root", "wit123", "udine");
	$db_table = "users";
	
	$pw_error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_Button'])) 
   {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($connection,$_POST['email']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT UserID, 'active' FROM users WHERE Email = '$myemail' and Password = '$mypassword'";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myemail");
         $_SESSION['login_user'] = $myemail;
         
         header("location: uDine Menu.html");
      }else {
         $pw_error = "Invalid username or password!";
      }
   }
	
	if(isset($_POST['signup_Button']))
	{
   
		//Fetching variables of the form which travels in URL
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password']; //password_hash($password, PASSWORD_DEFAULT);
		$college = $_POST['college'];
		
		if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($college)){
		//Insert Query of SQL
		
		$sql = "INSERT INTO ". $db_table. " (FirstName, LastName, Email, Password, College)
			VALUES('$firstname', '$lastname', '$email', '$password', '$college')";
		$query = mysqli_query($connection, $sql);
		//echo "<br/><br/><span>Data Inserted successfully...!!</span>";
		}
		else{
		echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";   
		}
 
	}
	//Closing Connection with Server
	mysqli_close($connection);
	*/
?>				

<!DOCTYPE html>
<!--uDine Login Page-->
<!--It is the same as uDine Login.php with the addition of more features to let the user know they are logged in-->
<!--To see most of the pseudocode, please view uDine Login.php-->
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="shortcut icon" type="image/png" href="static/pics/favicon.ico">
	<link rel = "stylesheet" href="http://localhost:8080/udine/uDine.css">

	<link href="netdna.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	<script src="netdna.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  
  <body>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<hr>
<!--Sign out button-->
<Center><h1><img src = "Images/uDine Logo.jpg" id = "udinelogo" alt = "logo" /><align = "right" <button type ="submit" onclick = "window.location.href='uDine Login.php'" name = "signout_Button" class="AccountButtons" id = "signOutButton">Sign Out</button></align></h1></Center>
<hr>

<!--Message that lets the user know they are signed in (displays the email used to log-in to the account)-->
<p name = "loginmessage" id = "loginmsg"> <b>You are logged in as: </b><?php echo $login_session; ?></p>

<div class="tab">
	<button onclick="window.location.href='uDine Home.html'">Home</button>
	<button onclick="window.location.href='uDine MenuLoggedIn.php'">Menu</button>
	<button onclick="window.location.href='uDine LoginPageLoggedIn.php'" class = "active">Login</button>
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
                            
                        <form id="loginform" class="form-horizontal" role="form" action="uDine Login.php" method="post">
                          
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
									
									<button type ="submit" name = "login_Button" class="AccountButtons" id = "loginButton">Login</button>
                                </div>

								<?php echo $pw_error?>

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
									<button type ="submit" name = "signup_Button" class="AccountButtons" id = "signupButton">Sign-up</button>
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
			<script src="static/js/jquery.min.js"></script>
			<script src="static/js/jquery.scrollex.min.js"></script>
			<script src="static/js/jquery.scrolly.min.js"></script>
			<script src="static/js/skel.min.js"></script>
			<script src="static/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="http://localhost:8080/static/js/main.js"></script>



  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  

</html>


