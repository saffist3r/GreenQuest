<?php
	if(isset($_POST['email']))
	  {
	  	$mail = $_POST['email'];
	    $mdp = $_POST['mdp'];
	    
		$mysqli = new mysqli("localhost", "root", "", "greenapp");
		if ($mysqli->connect_errno) {
		    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
			$query = "select * from personne where email='$mail' and mdp='$mdp';";
			echo "$query";
			if($res=$mysqli->query($query)){
			$reslt=$res->fetch_row();
			echo $reslt[0]." ".$reslt[1]." ".$reslt[2]."xxx";
			setcookie('email',$mail);
			setcookie('photo',$reslt[4]);
			setcookie('nom',$reslt[2].' '.$reslt[3]);
			header('Location:index.php');}
			else
			{
				header('Location:connexion.php?error');
			}
		}
	?>