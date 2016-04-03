<?php 
	if(isset($_POST['username']) and isset($_POST['password']))
	{
		$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
		$query = "SELECT DISTINCT special_key FROM SPMas_users WHERE username='".($_POST['username'])."' and password='".($_POST['password'])."' LIMIT 1";
		$special_key = $conn->query($query);
		if ($special_key->num_rows > 0)
		{
			while($special_key_obj = $special_key->fetch_assoc()) 
			{
				session_start();
				$_SESSION['user_key']=$special_key_obj['id'];
				header('page.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Exam page</title>
   		
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="src/stylesheets/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="src/stylesheets/styles.css">

    <script src="src/javascripts/jquery-2.2.0.min.js"></script>
  </head>
  

  	<body>
  
          <nav class="light-blue lighten-1" role="navigation">
             <div class="nav-wrapper container"><a id="logo-container" href="#" class="right hide-on-med-and-down"><img src="src/assets/logo4.png" height="180px" width="180px" class = "logo-pic"></a> 

                   <ul class="brand-logo">   
    		                 <div class="top-title"><p align= "right">OSPF Exam</p></div>
                   </ul>
 

                   <ul id="nav-mobile" class="side-nav">
                      <li><a href="#">Navbar Link</a></li>
                   </ul>
                  <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            
            </div>
         </nav>

<div class="login-card"> 
		<div class="row">
       	 <div class="col s12 m7">
       	 	 <div class="card medium">
       		 
        
          		<div class="card-image">

                  <div class="col s12">
                      <p style="font-size: 120%; color: #29b6f6; padding-right: auto; padding-left:auto">Log in</p>
                  </div>
          			
          		</div>
				<form action='#' method='post'>
            	<div class="card-content">
            	   <div class="input-field col s12">
                    <input id="username" name='username' type="text" class="validate">
                    <label for="username">Username</label>
                 </div>

                <div class="input-field col s12" style="margin-top: 20%;">
                    <input name='password' id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
				</form>
            	</div>
           
            <div class="card-action">
              <a class = "waves-effect waves-light btn"  href="#" style="float:right">Continue</a>
        
            </div>
          </div>
        </div>
      </div>
      </div>




  <script src = "src/javascripts/materialize.js"></script>
  </body>
</html>
