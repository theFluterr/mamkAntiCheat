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

        <ul id="dropdown1" class="dropdown-content">
                <li><a href="textbased.html">Question 23</a></li>
                <li><a href="index.html">Question 24</a></li> 
        </ul>
  
      <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="right hide-on-med-and-down"><img src="src/assets/logo4.png" height="180px" width="180px" class = "logo-pic"></a> 
      
          <ul class="left hide-on-med-and-down">
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Go to question<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>

          <ul class="brand-logo">   
                <div class="top-title"><p align= "left">OSPF Exam</p></div>
         </ul>

        
 

            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
           <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
       </div>
    </nav>

  <div class="answer-text-card"> 
     <div class="row">
         <div class="col s12 m7">
            <div class="card medium">
           
             <form method="post" class="card-radio-container" action="#">
              <?php 
              print_r($_POST);
              if(isset($_POST['prev_c']))
                echo '<div class="card-image">
                  <div class="card-text-question-title"><p>Question 24</p></div>
                  
              </div>
              
              <div class="card-content">
                <div class="answer-text-question">
                      <p>Where do we usually use the OSPF routing protocol?</p>
                 </div>
                
                
                    <p>
                        <input type="checkbox" id="test5" />
                        <label for="test5">In automobiles</label>
                    </p>
                    <p>
                         <input type="checkbox" id="test4"  />
                         <label for="test4">In the kitchen</label>
                    </p>
                    <p>
                         <input type="checkbox" id="test3"  />
                         <label for="test3">Near Microsoft Office</label>
                    </p>
                    <p>
                         <input type="checkbox" id="test2"  />
                         <label for="test2">When interconnecting the networks</label>
                    </p>
                    <p>
                         <input type="checkbox" id="test1" />
                         <label for="test1">While walking with the dog in the park</label>
                    </p>
                    
              </div>';
              elseif(isset($_POST['next_c']))
              echo '<div class="card-image">
                  <div class="card-text-question-title"><p>Question 23</p></div>
                  
              </div>

              <div class="card-content">
                <div class="answer-text-question">
                      <p>Explain how OSPF works in multi-area networks</p>
                 </div>
                
                <div class="answer-text-field">
                    <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
                    <label for="textarea1">Your answer</label>
                  </div>
                </div>
              </div>';
           ?>
            <div class="card-action">
              <input type='submit' style='align:left; background:none; border:none; #color: #29b6f6; font-size: 130%;' value='Previous' name='prev_c'>
              <input type='submit' style='align:left; background:none; border:none; #color: #29b6f6; font-size: 130%;' value='Next' name='next_c'>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>

       <div class="fixed-action-btn tooltipped submit-btn" data-position="top" data-delay="50" data-tooltip="Submit">
            <a class="btn-floating  btn-large blue waves-effect waves-light blue " >

                <i class="large material-icons">done</i>
            </a>    


  <!--<div class="answer-text-field">
    <div class="">
      <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
            <label for="textarea1">Your answer</label>
          </div>
  </div>-->

  <script src = "src/javascripts/materialize.js"></script>
  </body>
</html>