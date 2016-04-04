<?php 
	if($_POST['logout']=='true')
	{
		session_start();
		session_unset();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',0,'/');
		session_regenerate_id(true);
		header('Location:http://mamk-acs.cloudapp.net/');
	}
	$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
	session_start();
	if(isset($_SESSION['user_key']))
	{
		$query = "SELECT DISTINCT id FROM SPMas_users WHERE special_key='".($_SESSION['user_key'])."' LIMIT 1";
		$id_val = $conn->query($query);
		if ($id_val->num_rows > 0)
		{
			while($id_obj = $id_val->fetch_assoc()) 
			{
				$userid=$id_obj['id'];
			}
		}
	}
	else{
		header('Location:http://mamk-acs.cloudapp.net/');
	}
	if($userid!='3') header('Location:http://mamk-acs.cloudapp.net/');
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
    		                 <div class="top-title"><p align= "right">OSPF Exam: Teachers panel</p></div>
                   </ul>
 

                   <ul id="nav-mobile" class="side-nav">
                      <li><a href="#">Navbar Link</a></li>
                   </ul>
                  <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            
            </div>
         </nav>

<div class="teacher-screen-card"> 
		<div class="row">
       	 <div class="col s6 " style="float:left;">
       	 	 <div class="card large">
       		 
        
          		<div class="card-image">
                   <p style="font-size : 150%; color: #29b6f6;  padding-left:10%;">PC 1</p>
          			
          		</div>
				<?php 
				date_default_timezone_set("Europe/Helsinki"); 
				?>
            	<div class="card-content">
            
                      <ul class="collapsible popout" data-collapsible="accordion">
                              <li>
                                   <div class="collapsible-header"><i class="material-icons">toc</i>Question 1</div>
                                   <div id='pc1_card1' class="collapsible-body"><p></p></div>
                             </li>
                              <li>
                                   <div class="collapsible-header"><i class="material-icons">report_problem</i>Question 2</div>
                                   <div id='pc1_card2' class="collapsible-body"></p></div>
                             </li>
                      </ul>

            	</div>
           
            <div class="card-action">
                <a class = "waves-effect waves-light btn"  href="#" style="margin-left: 35%;">block</a>
        
            </div>
          </div>
         </div>
      

         <div class="col s6" style = "float:right; margin-top:-15px">
           <div class="card large">
           
        
              <div class="card-image">

                <p style="font-size : 150%; color: #29b6f6;  padding-left:10%;">PC 2</p>
              </div>

              <div class="card-content">
					<ul class="collapsible popout" data-collapsible="accordion">
						  <li>
							   <div class="collapsible-header"><i class="material-icons">toc</i>Question 1</div>
							   <div id='pc2_card1' class="collapsible-body"></div>
						 </li>
						  <li>
							   <div class="collapsible-header"><i class="material-icons">report_problem</i>Question 2</div>
							   <div id='pc2_card2' class="collapsible-body"></div>
						 </li>
					</ul>
				</div>
				<script>  
					function show(check_key, pccard)  
					{  
						$.ajax({  
							type:"POST",
							url: "handler.php",  
							data: {"check_adminKEY102ao":check_key},
							cache: false,  
							success: function(html){  
								$("#"+pccard).html(html);  
							},
							error: function(html){  
								alert('Error');
							}
						});  
					}
					function startloop(){
						show(3, 'pc1_card1');
						setTimeout(function(){ show(4, 'pc1_card2'); }, 1000);
						setTimeout(function(){ show(1, 'pc2_card1'); }, 1000);
						setTimeout(function(){ show(2, 'pc2_card2'); }, 1000);
					}
					$(document).ready(function(){  
						startloop();
						setInterval('startloop()',5000);
					});  
				</script>
           
            <div class="card-action">
                    <a class = "waves-effect waves-light btn"  href="#" style="margin-left: 35%;">block</a>
        
        
            </div>
          </div>
         </div>
        </div>
      </div>
		<form style='visibility:hidden;' id='logout' action='#' method='post'>
			<input type='hidden' name='logout' value='true'>
		</form>


                  <div id='logoutb' class="fixed-action-btn tooltipped submit-btn" style="bottom:15px" data-position="top" data-delay="50" data-tooltip="Exit">
                      <a class="btn-floating  btn-large blue waves-effect waves-light blue " >
                            <i class="large material-icons">power_settings_new</i>
                     </a>   

		<script>
			document.getElementById("logoutb").addEventListener("click", function(){
				setTimeout(function() { document.getElementById("logout").submit() }, 500)
			});
		</script>
  <script src = "src/javascripts/materialize.js"></script>
  </body>
</html>
