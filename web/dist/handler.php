<?
if(isset($_POST['check_adminKEY102ao'])) 
{
	$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
	$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='1' ORDER by unix_time DESC LIMIT 1";
	$answer = $conn->query($query);
	if ($answer->num_rows > 0)
	{
		while($answer_obj = $answer->fetch_assoc()) 
		{
			echo '<p>'.($answer_obj['answer_value']).'</p>';
		}
	}
	
	/*	  
		  <li>
			   <div class="collapsible-header"><i class="material-icons">report_problem</i>Question 2</div>
			   <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
		 </li>
	</ul>*/
}

?>