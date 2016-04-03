<?php 
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
  

    <body id='body'>
	<form id='test_form' method="post" style='padding:0;' class="card-radio-container" action="#">
        <ul id="dropdown1" class="dropdown-content">
		 <?php 
		 if($_POST['finish']!='true')
			{
				echo "<li><input style='outline:none; background:none; border:none; font-size: 16px; color: #29b6f6; display: block; line-height: 22px; padding: 14px 16px;' type='submit' name='quest_1' value='Question 1'></li>";
                echo "<li><input style='outline:none; background:none; border:none; font-size: 16px; color: #29b6f6; display: block; line-height: 22px; padding: 14px 16px;' type='submit' name='quest_2' value='Question 2'></li> ";
			}
		 ?>
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
              <?php 
					date_default_timezone_set("Europe/Helsinki"); 
					$time=time()+(3*3600);
					//print_r($_POST);
					if(isset($_POST['qid']) and $_POST['qid']==2)
					{
						$answer_value=$_POST['2_ans'];
						$query="INSERT IGNORE INTO test_log_answers(user_id,question_id,unix_time,answer_value) VALUES ('1','2','$time','$answer_value')";
						$conn->query($query);
					}
					if(isset($_POST['qid']) and $_POST['qid']==1)
					{
						for($index=1; $index<6; $index++)
						{
							if($_POST["1_".($index)."_ans"]=='1')
							$ans_list[]="1_".($index)."_ans";
						}
						$answer_value=serialize($ans_list);
						$query="INSERT IGNORE INTO test_log_answers(user_id,question_id,unix_time,answer_value) VALUES ('1','1','$time','$answer_value')";
						$conn->query($query);
					}
					if(isset($_POST['finish']) and $_POST['finish']=='true')
					{
						$query = "INSERT INTO test_final_res(user_id,question_id,answer) SELECT user_id,question_id,answer_value FROM test_log_answers WHERE user_id='1' and question_id='1' ORDER by unix_time DESC";
						$conn->query($query);
						$query = "INSERT INTO test_final_res(user_id,question_id,answer) SELECT user_id,question_id,answer_value FROM test_log_answers WHERE user_id='1' and question_id='2' ORDER by unix_time DESC";
						$conn->query($query);
						echo '<div class="card-content" style="text-align:center;"><h1>Thank you for passing the test!</h1></div>';
						session_start();
						session_unset();
						session_destroy();
						session_write_close();
						setcookie(session_name(),'',0,'/');
						session_regenerate_id(true);
					}
					else
					{
						if(isset($_POST['quest_1']) or !isset($_POST['quest_2']))
						{
							$query = "SELECT DISTINCT answer_value FROM test_log_answers WHERE user_id='1' and question_id='1' ORDER BY unix_time DESC LIMIT 1";
							$answer_value = $conn->query($query);
							if ($answer_value->num_rows > 0)
							{
								while($answer_val = $answer_value->fetch_assoc()) 
								{
									$answer=unserialize($answer_val['answer_value']);
								}
							}
							//print_r($answer);
							$keylist=array();
							if(isset($answer))
							foreach($answer as $key=>$value)
							{
								$keylist[]=$value;
							}
							
							echo '
								<input type="hidden" name="qid" value="1">
								<div class="card-image">
									<div class="card-text-question-title"><p>Question 1</p></div>
								</div>
						  
								<div class="card-content">
									<div class="answer-text-question">
										<p>Where do we usually use the OSPF routing protocol?</p>
									</div>
									<p>
										<input ';
										if (in_array("1_1_ans", $keylist)) echo 'checked';
										echo ' name="1_1_ans" value="1" type="checkbox" id="test5" />
										<label for="test5">In automobiles</label>
									</p>
									<p>
										<input ';
										if (in_array("1_2_ans", $keylist)) echo 'checked';
										echo ' name="1_2_ans" value="1" type="checkbox" id="test4"  />
										<label for="test4">In the kitchen</label>
									</p>
									<p>
										<input ';
										if (in_array("1_3_ans", $keylist)) echo 'checked';
										echo ' name="1_3_ans" value="1" type="checkbox" id="test3"  />
										<label for="test3">Near Microsoft Office</label>
									</p>
									<p>
										<input ';
										if (in_array("1_4_ans", $keylist)) echo 'checked';
										echo ' name="1_4_ans" value="1" type="checkbox" id="test2"  />
										<label for="test2">When interconnecting the networks</label>
									</p>
									<p>
										<input ';
										if (in_array("1_5_ans", $keylist)) echo 'checked';
										echo ' name="1_5_ans" value="1" type="checkbox" id="test1" />
										<label for="test1">While walking with the dog in the park</label>
									</p>
								</div>';
						}
						if(isset($_POST['quest_2']))
						{
							$query = "SELECT DISTINCT answer_value FROM test_log_answers WHERE user_id='1' and question_id='2' ORDER BY unix_time DESC LIMIT 1";
							$answer_value = $conn->query($query);
							if ($answer_value->num_rows > 0)
							{
								while($answer_val = $answer_value->fetch_assoc()) 
								{
									$answer=$answer_val['answer_value'];
								}
							}
							echo '
									<input type="hidden" name="qid" value="2">
									<div class="card-image">
										<div class="card-text-question-title"><p>Question 2</p></div>
									</div>

									<div class="card-content">
										<div class="answer-text-question">
											<p>Explain how OSPF works in multi-area networks</p>
										</div>
						
										<div class="answer-text-field">
											<div class="input-field col s12">
												<textarea name="2_ans" id="textarea1" class="materialize-textarea" length="120">'.($answer).'</textarea>
												<label for="textarea1">Your answer</label>
											</div>
										</div>
									</div>';
						}
					}
				?>
            <div class="card-action">
				<?php
				if($_POST['finish']!='true')
				{
					if(isset($_POST['quest_2']))
					{
						echo "<input id='prev_c' type='submit' style='align:left; background:none; border:none; color: #29b6f6; font-size: 130%;' value='Previous' name='prev_c'>";
						echo "<input type='hidden' name='quest_1' value='1'>";
					}
					if(!isset($_POST['quest_2']) or isset($_POST['quest_1']))
					{
						echo "<input id='next_c' type='submit' style='align:left; background:none; border:none; color: #29b6f6; font-size: 130%;' value='Next' name='next_c'>";
						echo "<input type='hidden' name='quest_2' value='1'>";
					}
				}
				?>
            </div>
          </div>
        </div>
      </div>
      </div>

       <div id='done_form' class="fixed-action-btn tooltipped submit-btn" data-position="top" data-delay="50" data-tooltip="Submit">
            <a class="btn-floating  btn-large blue waves-effect waves-light blue " >

                <i class="large material-icons">done</i>
            </a>    
        <input id='finish_val' type='hidden' name='finish'>
		<script>
			document.getElementById("done_form").addEventListener("click", function(){
				document.getElementById("finish_val").value='true';
				setTimeout(function() { document.getElementById("test_form").submit() }, 500)
			});
		</script>
			
  <script src = "src/javascripts/materialize.js"></script>

  </form>
  </body>
</html>
