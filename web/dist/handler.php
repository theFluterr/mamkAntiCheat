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
				$answerarr=unserialize($answer_obj['answer_value']);
				foreach($answerarr as $key=>$value)
				{
					$keylist[]=$value;
				}
				if (in_array("1_1_ans", $keylist)) {$ans_f='In automobiles; '; $keyl2[]=1;}
				if (in_array("1_2_ans", $keylist)) {$ans_f.='In the kitchen; '; $keyl2[]=2;}
				if (in_array("1_3_ans", $keylist)) {$ans_f.='Near Microsoft Office; '; $keyl2[]=3;}
				if (in_array("1_4_ans", $keylist)) {$ans_f.='When interconnecting the networks; '; $keyl2[]=4;}
				if (in_array("1_5_ans", $keylist)) {$ans_f.='While walking with the dog in the park;'; $keyl2[]=5;}
				$ans_f.='<br>';
			}
		}
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='1' and question_id='1' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				$answerarr=unserialize($answer_obj['answer_value']);
				foreach($answerarr as $key=>$value)
				{
					$keylist[]=$value;
				}
				if (in_array("1_1_ans", $keylist)) $keyll2[]=1;
				if (in_array("1_2_ans", $keylist)) $keyll2[]=2;
				if (in_array("1_3_ans", $keylist)) $keyll2[]=3;
				if (in_array("1_4_ans", $keylist)) $keyll2[]=4;
				if (in_array("1_5_ans", $keylist)) $keyll2[]=5;	
			}
		}
		$result_c=array_intersect($keyl2,$keyll2);
		$result_c=count($result_c);
		$result_c-=1;
		echo '<p>Where do we usually use the OSPF routing protocol?<br>'.($ans_f).'<b>'.($time).'</b><br><b>1st pc -<b>'.($result_c*20).'%</p>';
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
		echo '<p>Explain how OSPF works in multi-area networks<br>'.($answeropt).'<br><b>'.($time).'</b><br><b>1st pc -<b>'.(round($percentage, 2)).'%</b></b></p>';
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
				$answerarr=unserialize($answer_obj['answer_value']);
				foreach($answerarr as $key=>$value)
				{
					$keylist[]=$value;
				}
				if (in_array("1_1_ans", $keylist)) {$ans_f='In automobiles; '; $keyl2[]=1;}
				if (in_array("1_2_ans", $keylist)) {$ans_f.='In the kitchen; '; $keyl2[]=2;}
				if (in_array("1_3_ans", $keylist)) {$ans_f.='Near Microsoft Office; '; $keyl2[]=3;}
				if (in_array("1_4_ans", $keylist)) {$ans_f.='When interconnecting the networks; '; $keyl2[]=4;}
				if (in_array("1_5_ans", $keylist)) {$ans_f.='While walking with the dog in the park;'; $keyl2[]=5;}
				$ans_f.='<br>';
			}
		}
		$query = "SELECT DISTINCT * FROM test_log_answers WHERE user_id='2' and question_id='1' ORDER by unix_time DESC LIMIT 1";
		$answer = $conn->query($query);
		if ($answer->num_rows > 0)
		{
			while($answer_obj = $answer->fetch_assoc()) 
			{
				$time = gmdate("Y-m-d H:i:s", $answer_obj['unix_time']);
				$answerarr=unserialize($answer_obj['answer_value']);
				foreach($answerarr as $key=>$value)
				{
					$keylist[]=$value;
				}
				if (in_array("1_1_ans", $keylist)) $keyll2[]=1;
				if (in_array("1_2_ans", $keylist)) $keyll2[]=2;
				if (in_array("1_3_ans", $keylist)) $keyll2[]=3;
				if (in_array("1_4_ans", $keylist)) $keyll2[]=4;
				if (in_array("1_5_ans", $keylist)) $keyll2[]=5;	
			}
		}
		$result_c=array_intersect($keyl2,$keyll2);
		$result_c=count($result_c);
		$result_c-=1;
		echo '<p>Where do we usually use the OSPF routing protocol?<br>'.($ans_f).'<b>'.($time).'</b><br><b>2nd pc -<b>'.($result_c*20).'%</p>';
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
		echo '<p>Explain how OSPF works in multi-area networks<br>'.($answer2).'<br><b>'.($time2).'</b><br><b>2nd pc -<b>'.(round($percentage, 2)).'%</b></b></p>';
	}
}

?>