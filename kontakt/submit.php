<?php

$email_to = "riaditelka@cms-korab.sk, cms-korab@gmail.com";
$email_subject = "contact@cms-korab.sk";

function died($error) {
	echo "Ospravedlňujeme sa za vzniknuté problémy. <br /> ";
	echo "Tieto problémy sa zobrazia nižšie. <br /><br />";
	echo $error."<br /><br />";
	echo "Prosím vráťte sa späť a opravte tieto chyby";
	die();
}

if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['subject']) || !isset($_POST['message']))  {
	died('Vyplňte prosím všetky povinné polia!');
}

//CAPTCHA

session_start();
if(isset($_POST["captcha"])&& $_POST["captcha"]!="" && $_SESSION["code"]==$_POST["captcha"])
{
echo "Správna captcha!<br /> Email bol odoslaný. <br /> Budeme Vás kontaktovať! <br />";
}
else
{
die("Zlá captcha");
}
//*CAPTCHA

$name = $_POST['name']; //povinné
$email = $_POST['email']; //povinné
$phone = $_POST['phone']; //povinné
$subject = $_POST['subject']; //povinné
$message = $_POST['message']; //povinné

$error_message = "";
$email_check = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if (!preg_match($email_check, $email)) {
	$error_message .= 'Neplatná emailová adresa.<br />';
}	

  if(strlen($message) < 2) {
 
    $error_message .= 'Správa, ktorú ste zadali obsahuje neplatné znaky.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }

  
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
	
	$email_message .= "Meno a priezvisko: ".clean_string($name)."\n";
	
    $email_message .= "Email: ".clean_string($email)."\n";
		
    $email_message .= "Telefón: ".clean_string($phone)."\n";
	
	$email_message .= "Predmet: ".clean_string($subject)."\n";
 
    $email_message .= "Správa: ".clean_string($message)."\n";
	
	
	
	
	$headers = 'Od: '.$email."\r\n".
 
	'Odpovedať: '.$email."\r\n" .
 
	'X-Mailer: PHP/' . phpversion();
 
	@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
