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
				echo '<p>'.($answer_obj['answer_value']).'<br><b>'.($time).'</b></p>';
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
				$answer=$answer_obj['answer_value'];
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
		similar_text($answer,$answer2,$percentage);
		echo '<p>'.($answer).'<br><b>'.($time).'</b><br><b>Checked closest student answers: <b>'.($percentage).'%</b></b></p>';
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
				echo '<p>'.($answer_obj['answer_value']).'<br><b>'.($time).'</b></p>';
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
				$answer=$answer_obj['answer_value'];
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
		similar_text($answer,$answer2,$percentage);
		echo '<p>'.($answer2).'<br><b>'.($time2).'</b><br><b>Checked closest student answers: <b>'.($percentage).'%</b></b></p>';
	}
}

?>