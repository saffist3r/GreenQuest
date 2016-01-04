<?php
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
		<title>GREENAPP</title>
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
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
							  if(isset($_POST['email']))
							  {
							    $mail = $_POST['email'];
							    $nom = $_POST['name'];
							    $sujet = $_POST['subject'];
							    $message=$_POST['message'];
							$mysqli = new mysqli("localhost", "root", "", "greenapp");
							if ($mysqli->connect_errno) {
							    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
							}
							$query = "INSERT into contact  values ('".$nom."','".$mail."','".$sujet."','".$message."');";
							$mysqli->query($query);
							  }
							  ?>
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
								<h1 class="animated fadeInDown">CONTESTER VOS AMIS EN RESOLVANT LES QUÊTES.</h1>
								<a href="#featured-work" class="featured-work">ACTUALITE</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 continue text-center">
								<a href="#profile" class="continue-btn floating">
								<i class="fa fa-angle-down"></i></a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>
		<section id="profile" class="intro">
			<div class="container">
				<div class="row wp1">
					<?php
$mysqli = new mysqli("localhost", "root", "", "greenapp");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$query = "SELECT * FROM personne where email='".$_COOKIE['email']."'";
if ($result = $mysqli->query($query)) {

    /* Récupère un tableau associatif */
    while ($row = $result->fetch_row()) {
      ?>
      <div class="container">
      <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $row[4]; ?>" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nom : </td>
                        <td><?php echo $row[3]; ?></td>
                      </tr>                 
                         <tr>
                             <tr>
                        <td>Prenom : </td>
                        <td><?php echo $row[2]; ?></td>
                      </tr>
                        <tr>
                        <td>Email :</td>
                        <td><?php echo $row[0]; ?></td>
                      </tr>
                     <tr>
                        <td>Score</td>
                        <td><?php
                         $query1 = "select sum(validation) from score where email=".$_COOKIE['email'];
                          if ($reslt = $mysqli->query($query1)) {
                          $row1 = $reslt->fetch_row();
                          echo $row1[0]; }
      	                   
                         ?></td>
                      </tr>
                      </tr>
                     
                    </tbody>
                  </table>
 <?php   }
    $result->close();
  }  ?>

				</div>
			</div>
		</section>
		<section class="quote">
			<div class="container">
				<div class="row">
					<div class="cold-md-12 text-center wp5">
						<h1>“Terre fournit assez pour satisfaire les besoins de chaque homme, mais pas l'avidité de chaque homme.”</h1>
						<p class="author">- Mahatma Gandhi</p>
					</div>
				</div>
			</div>
		</section>
		<section class="featured-work-intro" id="featured-work">
			<div class="container">
				<div class="row">
					<h1>ACTUALITE.</h1>
					<div class="col-md-6">
						<p>LES QUÊTES DISPONIBLES.</p>
					</div>
				</div>
			</div>
		</section>
		<section class="screenshots" id="featured-work">
			<div class="container-fluid">
				<div class="row">
					<ul class="grid">
						<?php
							$mysqli = new mysqli("localhost", "root", "", "greenapp");
							if ($mysqli->connect_errno) 
							{
							    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
							}
							else
							{
								$query = "SELECT * FROM quete;";

							}
							if ($result = $mysqli->query($query)) 
							{
							    while ($row = $result->fetch_row()) 
							    {
							      	echo '<li>
											<figure>
												<img src="'.$row[3].'" alt="'.$row[3].'">
												<figcaption>
												<div class="caption-content">
													<a href="quete.php?qid='.$row[0].'" rel="">
														<h1>'.$row[1].'</h1>
														<p>'.$row[2].'<br>Difficulté:'.$row[4].'</p>
													</a>
												</div>
												<a href="'.$row[3].'" target="blanc" class="view-dribbble">
													<i class="fa fa-download"></i>
												</a>
												</figcaption>
											</figure>
										</li>';
								}
							}
						?>
						
						
					</ul>
				</div>
				<div class="row">
					<ul class="grid">
						
					</ul>
				</div>
				<div class="row">
					<ul class="grid">
						
					</ul>
				</div>
			</div>
		</section>
		<section class="freebies-intro text-center" id="freebies">
			<div class="container">
				<div class="row">
					<div class="cold-md-12 text-center wp5">
						<h1>“Va prendre tes leçons dans la Nature.”</h1>
						<p class="author">- Léonard de Vinci</p>
					</div>
				</div>
			</div>
		</section>
		<section class="freebies" id="realisation">
			<div class="container">
				<div class="row">
					<div class="col-md-6 freebies-text">
						<h1>CONTRIBUTION REALISE.</h1>
						<p>NOUS AVONS L'HONNEUR DE VOUS PRESENTER LE CONTRIBUTION DE NOS CHERS ISSATIENS DANS LE CADRE DE LA PROTECTION DE NOTRE ENVIROnNEMENT.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="grid">
							<?php
							$mysqli = new mysqli("localhost", "root", "", "greenapp");
							if ($mysqli->connect_errno) 
							{
							    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
							}
							else
							{
								$query = "SELECT * FROM contribution;";

							}
							if ($result = $mysqli->query($query)) 
							{
							    while ($row = $result->fetch_row()) 
							    {
							      	echo '<li>
											<figure class="wp10">
												<img src="'.$row[2].'" alt="'.$row[2].'">
												<figcaption>
												<div class="caption-content">
													<a href="'.$row[2].'" class="single_image">
														<h1>'.$row[3].'</h1>
														<p>'.$row[4].'</p>
													</a>
												</div>
												
												<a href="'.$row[2].'" target="blanc" class="view-dribbble">
													<i class="fa fa-download"></i>
												</a>

												</figcaption>
											</figure>
										</li>';
								}
							}
							?>
						

							

						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="grid">
							
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12 contact-wrapper">
						<h1>Contactez nous</h1>
						<?php
							  if(isset($_POST['email']))
							  {
							    $mail = $_POST['email'];
							    $nom = $_POST['name'];
							    $sujet = $_POST['subject'];
							    $message=$_POST['message'];
							$mysqli = new mysqli("localhost", "root", "", "greenapp");
							if ($mysqli->connect_errno) {
							    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
							}
							$query = "INSERT into contact  values ('".$nom."','".$mail."','".$sujet."','".$message."');";
							$mysqli->query($query);
							  }
							  ?>
							 
							<div class="container">
							    <div class="row">
							        <div class="col-md-8">
							            <div class="well well-sm">
							                <form action="index.php" method="POST">
							                <div class="row">
							                    <div class="col-md-6">
							                        <div class="form-group">
							                            <label for="name">
							                                Nom</label>
							                            <input type="text" class="form-control" name="name" placeholder="Enter name" required="required" />
							                        </div>
							                        <div class="form-group">
							                            <label for="email">
							                                Email</label>
							                            <div class="input-group">
							                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
							                                </span>
							                                <input type="email" class="form-control" name="email" placeholder="Enter email" required="required" /></div>
							                        </div>
							                        <div class="form-group">
							                            <label for="subject">
							                                Sujet</label>
							                            <select name="subject" name="subject" class="form-control" required="required">
							                                <option value="prop" selected="">Proposition</option>
							                                <option value="contact">Contact</option>
							                                <option value="bug">Reporter un Bug</option>
							                            </select>
							                        </div>
							                    </div>
							                    <div class="col-md-6">
							                        <div class="form-group">
							                            <label for="name">
							                                Message</label>
							                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
							                                placeholder="Message"></textarea>
							                        </div>
							                    </div>
							                    <div class="col-md-12">
							                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
							                            Envoyer</button>
							                    </div>
							                </div>
							                </form>
							            </div>
							        </div>
							        <div class="col-md-4">
							        </div>
							    </div>
							</div>
					</div>
				</div>
			</div>
		</section>
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