<?
if(isset($_POST['check_adminKEY102ao'])) echo "Check";
/*$conn = new mysqli('localhost', 'root', 'matti', 'mamk_acs');
$query = "SELECT DISTINCT special_key FROM SPMas_users WHERE username='".($_POST['username'])."' and password='".($_POST['password'])."' LIMIT 1";
$special_key = $conn->query($query);
if ($special_key->num_rows > 0)
{
	while($special_key_obj = $special_key->fetch_assoc()) 
	{
		session_start();
		$_SESSION['user_key']=$special_key_obj['special_key'];
		header('Location:http://mamk-acs.cloudapp.net/page.php');
	}
}
<ul class="collapsible popout" data-collapsible="accordion">
	  <li>
		   <div class="collapsible-header"><i class="material-icons">toc</i>Question 1</div>
		   <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
	 </li>
	  <li>
		   <div class="collapsible-header"><i class="material-icons">report_problem</i>Question 2</div>
		   <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
	 </li>
</ul>
*/
?>