<?php
	function maxlevel($x,$y)
	{
		$query="select * from participer p where idpersonne='$x' and quete=$y and where niv=(select max(n.id) from niveau n where n.queteid=$y) ;";
		$mysqli = new mysqli("localhost", "root", "", "greenapp");
		if($mysqli->query($query))
		{
			return 1;
		}
		else
			return 0;
	}
	if(isset($_COOKIE['email']) && isset($_COOKIE['qid']))
	{
		$email=$_COOKIE['email'];
		$qid=$_COOKIE['qid'];
		if(maxlevel($email,$qid))
		{
			header('Location:quete?qid=$qid');
		}
		else
		{
			$query="SELECT min(id) from niveau where queteid=$qid and id>=(select niv from participer where idpersonne='$email' and quete=$qid);";
			$mysqli = new mysqli("localhost", "root", "", "greenapp");
			$ress=$mysqli->query($query);
			$r=$ress->fetch_row();
			$id=$r[0];
			if(!$ress=$mysqli->query("select * from niveau where queteid=$qid and id=$id;"))
			{
				$req="select min(id) from niveau where queteid=$qid";
				$ress=$mysqli->query($req);
				$val = $ress->fetch_row();
				$req ="insert into participer values('".$_COOKIE['email']."',0,$qid);";
				
			}
			$ress=$mysqli->query("select * from niveau where queteid=$qid and id=$id;");
			$rx=$ress->fetch_row();
			setcookie('niv',$id);
			$queteid=$rx[1];
			setcookie("queteid",$queteid);
			$lib=$rx[2];
			$descrip=$rx[3];
			$mdp=$rx[4];
		}
	}
	else
	{
		header('Location:quetes.php');
	}
if(isset($_COOKIE['email']))
	{
		if(!isset($_COOKIE['photo'])){header('connexion.php?error');}
		$con='<div id="headeravatar">
								<img src="'.$_COOKIE['photo'].'" alt="'.$_COOKIE['nom'].'" width="55">
							</div>
							<a href="logout.php" style="color:white"><span>'.$_COOKIE['nom'].'</span></a>';
	}
	else
	{
		header('Location:connexion.php');
		$con="<a href='connexion.php' style='color:white;'><span>Connecter - </span></a><a href='inscription.php' style='color:white;'><span>Inscription</span></a>";
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--[if gte IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie9.css" />
<![endif]-->
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Green Quest</title>
		<!-- Bootstrap -->
		<script src="js/modernizr.custom.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css?v=1.2" rel="stylesheet">
		<link href="css/queries.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/jquery.fancybox.css" rel="stylesheet">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200' rel='stylesheet' type='text/css'>
		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content="Peter Finlan - UX/UI Designer Sydney"/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content="http://www.peterfinlan.com/"/>
		<meta property="og:site_name" content="Peter Finlan - UX/UI Designer Sydney"/>
		<meta property="og:description" content="Pete's a UX/UI Designer that has a passion for creating beautiful, user centric digital experiences"/>
		<meta name="twitter:title" content="Peter Finlan - UX/UI Designer Sydney" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="http://www.peterfinlan.com/" />
		<meta name="twitter:card" content="Pete's a UX/UI Designer that has a passion for creating beautiful, user centric digital experiences" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="preloader"></div>
		<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<header>
			<section class="hero">
				<div class="texture-overlay"></div>
				<div class="contaier-fluid">
					<div class="row fixed-header">
						
						<div class="col-md-6 col-sm-6 col-xs-6 text-left logotype">
							<?php
								echo $con;
							?>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 text-right navicon">
							<a id="trigger-overlay" class="nav_slide_button nav-toggle" href="#"><span></span></a>
						</div>
					</div>
				</div>
				<div class="hero-content">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 text-center">
								<h2><?php echo $lib; ?></h2>
								<div class="mid">
									<span><?php echo $descrip; ?></span><br><br><br>
									
									<?php
										setcookie('mdp',$mdp);
									?>
									<form action="validatehint.php" method="POST">
										<input type="text" placeholder="Donner votre réponse à ce niveau" name="mdp">
										<input type="submit" value="Vérifier">
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>
		<div class="overlay navigation">
			<nav>
				<ul>
					<?php
						include_once("menu.php");
					?>
				</ul>
			</nav>
		</div>
		<a href="#0" class="cd-top">Top</a>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/toucheffects.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/scripts.js?v=1.3"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
		<script src="js/retina.js"></script>
		<script src="js/waypoints.min.js"></script>
		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-67288927-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</body>
</html>