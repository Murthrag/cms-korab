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
	<title>Nástenka</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script>
        $("#includeHeader").load("all/header.php");
        $("#includeFooter").load("all/footer.html");

        // prihlaseneho uzivatela musi nacitat az neskor
        $(function(){
            $("#includeHeader").load("all/header.php");
            $("#includeFooter").load("all/footer.html");                
        });
    </script>

</head>
<body>
	<div id="includeHeader"></div>
	<div style="margin-top: 250px"></div>
	
    <center>
        <h2 class="font_4">
            <span class="color_15">Udalosti našej školy</span>
        </h2>
    </center>
    <br>
    <br>
    <?php
        if($username != "Prihlásiť")
        {
            echo '<center><a href="nastenkaEdit.php" class="button someMagic">Pridať udalosť</a></center>';
        }
	
		include $_SERVER['DOCUMENT_ROOT'] . "/nastenka/nastenka_vyber_zobraz.php";
	?>				
	<br>
	<div id="includeFooter"></div>	
</body>
</html>


<script>
	$(window).on('load', function() {
		resizeEvent();
	});
</script>
