<?
if(isset($_POST['check_adminKEY102ao'])) 
{
	
	if($_POST['check_adminKEY102ao']=='2') 
	{
		$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='1' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				echo 'error';
			}
		}
	}
	if($_POST['check_adminKEY102ao']=='1') 
	{
		$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='2' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				echo 'error';
			}
		}
	}
}

?>