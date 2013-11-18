<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>MusicJigsaw</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/my-theme.css" rel="stylesheet">
	<!--for parse -->
	<script src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
    <script src="js/parse-init.js?0200"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<!-- Fixed navbar: options -> navbar-default navbar-fixed --> 
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MusicJigsaw</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
	<!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
	-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron"  style="background-image: url(img/Music-Banner.jpg); background-repeat:repeat-x;
background-position:center; height=216px;">
        <h1>Solve the Jigsaw of music!</h1>
		<p>Play and rate computer generated music</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>

	  <!-- music and instrument selections -->
	  <!-- panel options: panel-default panel-primary panel-success panel-info panel-danger panel-warning -->
      <!-- progress bar -->
    <div class="row">  
      <!-- music -->
      <div class="col-sm-8">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Music Panel</h3>
            </div>
            <div class="panel-body">
         <!--    <button type="button" class="btn btn-lg btn-primary" 
			onclick="<?php $GLOBALS['str_song']="_song"?>">Prefer a Song?</button>
            -->
		<audio
            		autoplay = "true"
           			controls="true"
           			style="width: 512px;">
  					<!--<source src="horse.ogg" type="audio/ogg">-->
  					<source src="./music/<?php
        $conn = mysql_connect("localhost", "root", "password");
        mysql_select_db("jigsaw",$conn);
        if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        //first update the counting
        $sqlfst="SELECT bar_id FROM bar_queue LIMIT 1";
        $fffetch=mysql_query($sqlfst); //or die(mysql_error());
        //update the rating result
        $sqlsnd = "DELETE FROM bar_queue LIMIT 1";
        mysql_query($sqlsnd);
        mysql_close($conn);
        $query_row = mysql_fetch_array($fffetch);
        echo($query_row[0]);
?>.mp3" type="audio/mpeg">
						Your browser does not support the audio element.
				</audio>
            </div>
          </div>
          
          <!-- rank -->	
      <p>
        <h2> What do you think? </h2>
   <table>  
   <tr>
       <form action="update_rating.php" method="post">
	<input type="hidden" name="q_id" value="<?php echo $query_row[0]?>">
        <input type="hidden" name="q_rate" value="0">
        <button type="submit" value=0 class="btn btn-lg btn-default" onclick="">0</button>
      </form>
<form action="update_rating.php" method="post">
        <input type="hidden" name="q_id" value="<?php echo $query_row[0]?>">
        <input type="hidden" name="q_rate" value="1">
        <button type="submit" value=1 class="btn btn-lg btn-danger" onclick="">1</button>
      </form>
<form action="update_rating.php" method="post">
        <input type="hidden" name="q_id" value="<?php echo $query_row[0]?>">
        <input type="hidden" name="q_rate" value="2">
        <button type="submit" value=2 class="btn btn-lg btn-warning" onclick="">2</button>
      </form>
<form action="update_rating.php" method="post">
        <input type="hidden" name="q_id" value="<?php echo $query_row[0]?>">
        <input type="hidden" name="q_rate" value="3">
        <button type="submit" value=3 class="btn btn-lg btn-success" onclick="">3</button>
      </form>
<form action="update_rating.php" method="post">
        <input type="hidden" name="q_id" value="<?php echo $query_row[0]?>">
        <input type="hidden" name="q_rate" value="4">
        <button type="submit" value=4 class="btn btn-lg btn-info" onclick="">4</button>
      </form>
<form action="update_rating.php" method="post">
        <input type="hidden" name="q_id" value="<?php echo $query_row[0]?>">
        <input type="hidden" name="q_rate" value="5">
        <button type="submit" value=5 class="btn btn-lg btn-primary" onclick="">5</button>
      </form> 
   <!-- <button type="button" class="btn btn-lg btn-primary" 
                        onclick="<?php $GLOBALS['str_song']="_song"?>">Prefer a Song?</button>-->
        <form action = "1_song.mp3"> 
        <button type="button" class="btn btn-lg btn-link">Download a Song?</button>
        </form>
   </tr>
  </table>
      </p>
       </div><!-- /.col-sm-4 -->
       
       <!-- instruments-->
       <div class="col-sm-4">
          <div class="list-group">
            <a href="#" class="list-group-item active">
              Instruments
            </a>
            <a href="#" class="list-group-item">Piano
<!--
 <h4 class="list-group-item-heading">List group item heading</h4>
              <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
-->		</a>
            <a href="#" class="list-group-item">Drum</a>
            <a href="#" class="list-group-item">Guitar</a>
            <a href="#" class="list-group-item">Violin</a>
          </div>
        </div><!-- /.col-sm-4 -->
      </div> <!-- /.row -->
      
      <div class="progress">
        <div class="progress-bar" style="width: 100%"><span class="sr-only">Complete (success)</span></div>
      </div>
      
	<!--Options: btn-lg [] btn-sm btn-xs-->

	<!--<input type="number" name="your_awesome_parameter" data-max="4" data-min="0" id="some_id" class="rating" /> -->
	<!-- thumbnail
      <img data-src="holder.js/200x200" class="img-thumbnail" alt="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera">

	-->

	<!-- dropdown
      <div class="dropdown theme-dropdown clearfix">
        <a id="dropdownMenu1" href="#" role="button" class="sr-only dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
          <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
        </ul>
      </div>
	-->

      <!-- Alerts!
      <div class="alert alert-success">
        <strong>Well done!</strong> You successfully read this important alert message.
      </div>
      <div class="alert alert-info">
        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
      </div>
      <div class="alert alert-warning">
        <strong>Warning!</strong> Best check yo self, you're not looking too good.
      </div>
      <div class="alert alert-danger">
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
      </div>
	-->

<!-- class options: progres-bar-success [green] progress-bar-info [light-blue] progress-bar-warning [yellow] progress-bar-danger [red] 
 -->     
      <!--
      <div class="well">
      <p> well of information etc</p>
      </div>
	  -->

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <!--<script src="js/bootstrap-rating-input.min.js" type="text/javascript"></script>-->
    <script src="docs-assets/js/holder.js"></script>
  </body>
</html>
