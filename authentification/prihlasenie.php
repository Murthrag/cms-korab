<?php
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if( !isset($_POST['username']) || !isset($_POST['password']) ||
            empty($_POST['username']) || empty($_POST['password']))        
      {
         $error = "&nbsp;Prosím zadajte váše meno a heslo!"; 
      }else{
                  
          include("connectdbbljpm.php");
          session_start();          
          $username = mysqli_real_escape_string($conn,$_POST['username']);
          $password = mysqli_real_escape_string($conn,$_POST['password']); 
          $sql = "SELECT rola FROM prihlasenie WHERE login = '$username' and heslo = '$password'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $rola = $row['rola'];
          
          $count = mysqli_num_rows($result);

          // If result matched $myusername and $mypassword, table row must be 1 row

          if($count == 1) {
             
             $_SESSION['login_user'] = $username;
             $_SESSION['rola'] = $rola;
              
              echo "<script>window.parent.ReloadParent();</script>";
              mysqli_close($conn);
          }else {
             mysqli_close($conn);
             $error = "&nbsp;Váš login alebo heslo nie je správne!";
          }
      }
   }
?>
<html>
   
   <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		 <link rel="stylesheet" href="../all/style.css" />
   </head>
   
   <body style="background-color: #f8f8f8 !IMPORTANT;">   
        <form action = "" method = "post" class="iframeLogin"  >
            <div class="form-group">  
                <label>Užívatel  :</label>
                <input type="text" name="username" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Heslo  :</label>
                <input type = "password" name = "password" class="form-control" />
            </div>
          <input type="submit" value = " Prihlásiť " class="btn btn-default"/><br />
       </form>    
        
       <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    
   </body>
</html>

    
