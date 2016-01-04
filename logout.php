<?php
	setcookie('email',"",time()-1);
	setcookie('nom',"",time()-1);
	setcookie('photo',"",time()-1);
	header("Location:index.php");
?>