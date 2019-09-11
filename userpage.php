<?php
    include('includes/header.php');
    include('cnct.php');
    //Send all user data through session
    if(isset($_SESSION['user_id'])){
        $name = $_SESSION['user_id'];
        echo 'Bienvenido ',$name;
    }else{
        echo "no existe";
    }
?>

<?php
    include('includes/footer.php');
?>