<script>
/*    <?php
        session_start();
        if(isset($_SESSION['login_user']) && isset($_SESSION['rola'])) 
        {
            $username = $_SESSION['login_user'] ;
            $rola = $_SESSION['rola'];
            
        }else {
            $username = "Prihlásiť";
            $rola = "Prihlásiť";
        }
    echo $username . "  " .$rola;
    ?>
    var username = <?php echo $username; ?>; 
    var rola  = <?php echo json_encode("42", $rola); ?>;
</script>


 <?php if($username != "Prihlásiť") echo "title=\"odhlásiť\""?> 