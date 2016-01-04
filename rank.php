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
    <table class="table table-condensed">
    <thead>
      <tr>
         <th>#</th>
        <th>Lastname</th>
        <th>Score</th>
        <th>Badges</th>
      </tr>
    </thead>
      	<?php
  $mysqli = new mysqli("localhost", "root", "", "greenapp");
  if ($mysqli->connect_errno) {
      echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  $i=1;
  $query = "select email,sum(validation) from score group by email" ;

  if ($result = $mysqli->query($query)) {

      /* Récupère un tableau associatif */
      while ($row = $result->fetch_row()) {
      	?>
      <tr class="active">
      	<td><b><?php echo($i);
      			  $i++; ?></b></td>
        <td><b><?php echo($row[0]); ?></b></td>
        <td><b><?php echo($row[1]*30); ?></b></td>
      <?php
              if($row[1]>3) ?>
        <td><b><?php  ?></b></td>


      </tr>
      <?php

    }

    /* Libère le jeu de résultats */
    $result->close();
	} 
		?>
    </body>
  </table>
</div>
      </div>

    </div> <!-- /container -->
<script>
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });
           
        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true, 
                disabled:true
            });
        });
        
        
        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });
        
        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });
        
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>

  </body>
</html>

<?php
$mysqli->close();
?>