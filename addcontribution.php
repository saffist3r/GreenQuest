<?php
	if (isset($_POST['contri']) && $_POST['contri']!="") 
	{
		$photo=$_POST['contri'];
		$qid=$_COOKIE['qid'];
		$email=$_COOKIE['email'];
		$desc=$_COOKIE['desc'];
		$lib=$_COOKIE['lib'];
		$query="INSERT INTO contribution values('$email','$qid','$photo','lib','$desc');";
		$mysqli = new mysqli("localhost", "root", "", "greenapp");
		$mysqli->query($query);
			setcookie("desc",$descrip,time()-1);
			setcookie("lib",$lib,time()-1);
			setcookie("qid",$lib,time()-1);
		header('Location:index.php');
	}
?>