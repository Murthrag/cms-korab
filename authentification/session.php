<?php
   include $_SERVER['DOCUMENT_ROOT'] . "/connectdbbljpm.php";
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select login from prihlasenie where login = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
  /* if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }*/
?>
