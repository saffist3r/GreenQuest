<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPNAME</title>
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
    <?php
$mysqli = new mysqli("localhost", "root", "", "greenapp");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$query = "SELECT * FROM personne ";
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
                        <td><?php echo("200"); ?></td>
                      </tr>
                      </tr>
                     
                    </tbody>
                  </table>
 <?php   }
    $result->close();
  }  ?>
                  <a href="#" class="btn btn-primary">Proposer une quete</a>
                  <a href="#" class="btn btn-primary">quetes</a>
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>