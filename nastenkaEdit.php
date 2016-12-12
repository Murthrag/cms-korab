<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pridanie/uprava</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $("#includeHeader").load("all/header.php");

        // prihlaseneho uzivatela musi nacitat az neskor
        $(function(){
            $("#includeHeader").load("all/header.php");             
        });
    </script>
</head>
<body>
	<div id="includeHeader"></div>
	<div class="container pageLike" style="padding-left: 0px; height:100vh; margin-top: 240px">
<?php

	// Function for testing input format
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    if(isset($_POST['datumEdit'])) {
        echo '<script>alert("EDIT");</script>';
    }
     
    if(isset($_POST['datumDelete'])) {
		// connect DB
		include $_SERVER['DOCUMENT_ROOT'] . "/authentification/connectdbbljpm.php";
        $dtdelete = test_input($_POST["datumDelete"]);
        
        $sql = "DELETE FROM nastenka where datum = '".$dtdelete."'";

        $retval = mysqli_query( $conn, $sql );
		
		if(! $retval ) {
            mysqli_close($conn);
		    die('Nepodarilo sa zmazat data :( ' . mysqli_error());
        ?> 
            <script>window.location = "nastenka.php";</script>
        <?php
		}else{
            mysqli_close($conn);
        ?>
            <script>window.location = "nastenka.php";</script>         
        <?php
        }
    }
        
	if(isset($_POST['add'])) {
		// connect DB
		include $_SERVER['DOCUMENT_ROOT'] . "/authentification/connectdbbljpm.php";

		if(isset($_POST["datum_od"]))
			$dt_od = test_input($_POST["datum_od"]);

		if(isset($_POST["datum_do"]))
			$dt_do = test_input($_POST["datum_do"]);
			
		$nadpis = test_input($_POST["nadpis"]);
		$oznam_text = test_input($_POST["oznam_text"]);
					
		$sql = "INSERT INTO nastenka ". "(datum, ";
			if( $dt_od) 
				$sql = $sql . "dt_od,";
			if( $dt_do)
				$sql = $sql . "dt_do,";
			$sql = $sql . " nazov, oznam) VALUES(CURRENT_TIMESTAMP, ";
			if($dt_od)
				$sql = $sql . "'" .$dt_od. "', ";
			if($dt_do)
				$sql = $sql . "'" .$dt_do. "', ";
			$sql = $sql . "'" . mysqli_escape_string($conn, $nadpis) . "', ' " . mysqli_escape_string($conn, $oznam_text) . "' )";
		   
		$retval = mysqli_query( $conn, $sql );
		
		if(! $retval ) {
		   die('Nepodarilo sa ulozit data :( ' . mysqli_error());
		}
		
		echo "<center><h1>DATA BOLI ULOZENE!</h1></center>";
		echo "<center><h4>Toto okno sa automaticky presmeruje za <span id='odpocet'>5</span> sekund</h4></center>";
		
		mysqli_close($conn);
	?>
        <script>
			setTimeout(function(){
			  $('#odpocet').text("4");
			}, 1000);  
			setTimeout(function(){
			  $('#odpocet').text("3");
			}, 2000);  
			setTimeout(function(){
			 $('#odpocet').text("2");
			}, 3000);  
			setTimeout(function(){
			  $('#odpocet').text("1");
			}, 4000);  
			setTimeout(function(){
			  window.location = "nastenka.php";
			}, 5000);    
        </script>
        
        <?php
         }else {
        ?>
            
	<div class="container">
	  <h2>Pridávanie/ Úprava nástenky</h2>
	  <br>
	  <br>
	  <form method = "post" action = "<?php $_PHP_SELF ?>" class="form-horizontal">
		<div class="form-group" >
		  <label class="control-label col-sm-3" for="datum_od" style="text-align: left;">Dátum od:</label>
		  <label class="control-label col-sm-3" for="datum_do" style="text-align: left;">Dátum do:</label>
		</div>
		<div class="form-group">
		  <div class="col-sm-3">
			<input name="datum_od" type="date" class="form-control" id="datum_od" placeholder="Datum od, dňa alebo prázdny">
		  </div>
		  <div class="col-sm-3">
			<input name="datum_do" type="date" class="form-control" id="datum_do">
		  </div>
		</div>
		<div class="form-group">	
		  <label class="control-label col-sm-3" for="nadpis" style="text-align: left;">Nadpis oznamu:</label>
		  
		  <label class="control-label col-sm-3" for="oznam_text" style="text-align: left;">Oznam:</label>
		</div>
		<div class="form-group">
		  <div class="col-sm-3">
			<input name="nadpis" type="text" class="form-control" placeholder="Nadpis pre dôležitý oznam." id="nadpis">
		  </div>
		  
		  <div class="col-sm-8">
			  <textarea name="oznam_text" class="form-control" cols="200" rows="10" placeholder="Velmi dôležitá správa pre všetkých" id="oznam_text"></textarea>
			
		  </div>
		</div>
		<div class="form-group">
		  <div class="col-sm-offset-2 col-sm-8" align="right">
			<button name="add" id="add" type="submit" class="btn btn-default">Uložiť</button>
		  </div>
		</div>
	  </form>
	</div>

<?php  }// ukoncenie if podmienky pre zobrazenie 

		include $_SERVER['DOCUMENT_ROOT'] . "/nastenka/nastenka_vyber_zobraz.php";
?> 

    </div>

	<div id="includeFooter"></div>
</body>
</html>
<script>
	$(window).on('load', function() {
		resizeEvent();
	});
</script>