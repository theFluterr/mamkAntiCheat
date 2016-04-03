<?
if(isset($_POST['check_adminKEY102ao'])) 
{
	$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
	if($_POST['check_adminKEY102ao']=='1') 
	{
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='1' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				echo '<p>Where do we usually use the OSPF routing protocol?<br>'.($answer_obj['answer_value']).'<br><b>'.($time).'</b></p>';
			}
		}
	}
	if($_POST['check_adminKEY102ao']=='2') 
	{
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='2' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				$answeropt=$answer_obj['answer_value'];
			}
		}
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='1' and question_id='2' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time2 = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				$answer2=$answer_obj['answer_value'];
			}
		}
		similar_text($answeropt,$answer2,$percentage);
		echo '<p>Explain how OSPF works in multi-area networks'.($answeropt).'<br><b>'.($time).'</b><br><b>1st pc -<b>'.(round($percentage, 2)).'%</b></b></p>';
	}
	if($_POST['check_adminKEY102ao']=='3') 
	{
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='1' and question_id='1' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				echo '<p>Where do we usually use the OSPF routing protocol?<br>'.($answer_obj['answer_value']).'<br><b>'.($time).'</b></p>';
			}
		}
	}
	if($_POST['check_adminKEY102ao']=='4') 
	{
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='2' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				$answeropt=$answer_obj['answer_value'];
			}
		}
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='1' and question_id='2' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time2 = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				$answer2=$answer_obj['answer_value'];
			}
		}
		similar_text($answeropt,$answer2,$percentage);
		echo '<p>Explain how OSPF works in multi-area networks'.($answer2).'<br><b>'.($time2).'</b><br><b>2nd pc -<b>'.(round($percentage, 2)).'%</b></b></p>';
	}
}

?>