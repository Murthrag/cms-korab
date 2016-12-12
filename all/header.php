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


<!------------------------------ HEADER ---------------------------------------->
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="all/style.css" />
	
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
		</div>
	
	<hr style="margin-top: 5px; margin-bottom: 5px;">
	<div class="container" style="margin-bottom: 5px;">
		<div class="row">
			<div class="hidden-xs col-sm-2 col-md-1 col-lg-1" style="text-align:right;">
				<a href="index.html" style="text-decoration:none;">
					<img src="./images/logo.jpg"  height="98" width="98">
				</a>
			</div>

			<div class="col-xs-9 col-sm-10 col-md-10 col-lg-11 hlavicka_nadpis" >
				<a href="index.html" class="hlavicka_nazov color_1 font_2" >CIRKEVNÁ MATERSKÁ ŠKOLA „KORÁB“</a>
				<div id="hlavicka_zriadovatel" class="row" >
					<span >Zriaďovateľ evanielický zboro Liptovský Hrádok</span>
				</div>
			</div>
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
					  <li class="dropdown oSkoleMenu">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">O škole
                          <span class="caret"></span></a>
						<ul class="dropdown-menu dropdownOSKOLE" style="float:center; text-align:center">
						  <li style="margin-right: 9px;"><a href="o_skole.html#">
                              <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Charakteristika školy</a></li>
						  <li style="margin-right: 35px;"><a href="o_skole.html#zameranie_skoly_anchor">
                              <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Zameranie školy</a></li>
						  <li><a href="o_skole.html#den_v_skole_anchor">
                              <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Deň v materskej škole</a></li>
						  <li style="margin-right: 57px;"><a href="o_skole.html#zamestnanci_anchor">
                              <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Zamestnanci</a></li>
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
<script src="scripts/header.js"></script>
<!------------------------------ HEADER ---------------------------------------->




