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
                                   <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                             </li>
                              <li>
                                   <div class="collapsible-header"><i class="material-icons">report_problem</i>Question 2</div>
                                   <div class="collapsible-body"><p>He is cheatng! Percentage of similarity: 80%.</p></div>
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

					$(document).ready(function(){  
						show(1, 'pc2_card1');  
						setInterval('show(1, \'pc2_card1\')',5000);  
						show(2, 'pc2_card2');  
						setInterval('show(2, \'pc2_card2\')',5000);  
					});  
				</script>
           
            <div class="card-action">
                    <a class = "waves-effect waves-light btn"  href="#" style="margin-left: 35%;">block</a>
        
        
            </div>
          </div>
         </div>
        </div>
      </div>



                  <div class="fixed-action-btn tooltipped submit-btn" style="bottom:15px" data-position="top" data-delay="50" data-tooltip="Exit">
                      <a class="btn-floating  btn-large blue waves-effect waves-light blue " >
                            <i class="large material-icons">power_settings_new</i>
                     </a>   


  <script src = "src/javascripts/materialize.js"></script>
  </body>
</html>
