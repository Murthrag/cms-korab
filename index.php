<!DOCTYPE html>
<script>
    <?php
        session_start();
        if(isset($_SESSION['login_user']) && isset($_SESSION['rola'])) 
        {
            $username = $_SESSION['login_user'] ;
            $rola = $_SESSION['rola'];

        }else {
            $username = "Prihlásiť";
            $rola = "Prihlásiť";
        }
    ?>
    var username = <?php echo json_encode($username); ?>; 
    var rola  = <?php echo json_encode($rola); ?>;
</script>

<html lang="en">
	<head>
		<title>Cirkevná materská škola KORÁB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="all/style.css" />

    </head>
    
<body onresize="resizeEvent()">
	<div class="navbar-fixed-top" style="background-color: white;">
		<div class="container" >
			<div class="row hidden-xs" style="text-align:right;">	

				<object height="0">
					<a class="color_1 font_1" style="text-align:right; text-decoration: none;" data-auto-recognition="true" 
					data-content="info@cms-korab.sk" href="mailto:riaditelka@cms-korab.sk" data-type="mail">riaditelka@cms-korab.sk</a>
				</object>
				&nbsp; &nbsp;
				<span class="color_1 font_1" style="text-align:right;">(+421) 918 828 184</span>
			</div>

        <div class="row" id="header_menu" style="margin-top: 5px; height:20px;">
		<div class=" col-md-11 col-lg-11" style="height:20px;">
			<nav class="navbar navbar-default" >
			  <div class="container-fluid ">

				<div class="navbar-header pull-right prihlasitHover">
					<ul class="nav navbar-nav" style="margin-right: 10px;">
                     
					  <li><a href="authentification/odhlasit.php" <?php if($username != "Prihlásiť") echo "title=\"odhlásiť\""?> >
                      <?php 
                        if($username == "Prihlásiť" ) 
                        {
                          echo "<span class='glyphicon glyphicon-log-in'></span>&nbsp; &nbsp;";    
                          echo $username;
                        } else {  
                          echo $username . "&nbsp;\n";                            
                          echo "         <span class='glyphicon glyphicon-log-out'></span>";  
                        }
                      ?>
					  </a></li>
					</ul>
				</div>

				<div class="prihlasitIframe">
                    <?php 
                        if($username == "Prihlásiť" ) 
                        {
					       echo '<iframe id="loginIframe" src="authentification/prihlasenie.php" height="250" width="300"></iframe>';
                        }
                    ?>
				</div>

				<div class="navbar-header pull-left">
					&nbsp; &nbsp;
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse navbar-left" id="myNavbar">
					<ul class="nav navbar-nav ">
					  <li><a href="index.php">Domov</a></li>
					  <li class="dropdown"><a href="o_skole.html">O škole <span class="caret"></span></a>
						<ul class="dropdown-menu">
						  <li><a href="o_skole.html#">Charakteristika školy</a></li>
						  <li><a href="o_skole.html#zameranie_skoly_anchor">Zameranie školy</a></li>
						  <li><a href="o_skole.html#den_v_skole_anchor">Deň v materskej škole</a></li>
						  <li><a href="o_skole.html#zamestnanci_anchor">Zamestnanci</a></li>
						</ul>
					  </li>
					  <li><a href="dokumenty.html">Dokumenty</a></li>
					  <li><a href="nastenka.php">Nástenka</a></li>
					  <li><a href="galeria.html" title="Galéria">Galéria</a></li>
					  <li style='display:none;'><a href="podpora_a_sponzory.html">Podpora a sponzory</a></li>
					  <li><a href="kontakt.html">Kontakt</a></li>
					</ul>
				</div>
			  </div>
			</nav>
		</div>
		</div>
        </div>
        
        <div>
			<center><img src="./images/intro.jpg"  width="100%"></center>
        </div>
    </div>
    
<script src="scripts/header.js"></script>
<script>
    $(window).on('load', function() {
        resizeEvent();
    });
</script>
</body>
</html>
