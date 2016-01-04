<?php
	$mdp=$_COOKIE['mdp'];
	if (isset($_POST['mdp'])) 
	{
		if($mdp==$_POST['mdp'])
		{
			$niv=$_COOKIE['niv'];
			setcookie("niv","",time()-1);
			$qid=$_COOKIE['queteid'];
			setcookie("queteid","",time()-1);
			$email=$_COOKIE['email'];
			$mysqli = new mysqli("localhost", "root", "", "greenapp");
			$mysqli->query("UPDATE participer set niv=$niv where queteid=$qid and idpersonne='$email';");
		}
	}
	header('Location:quetes.php');
?>