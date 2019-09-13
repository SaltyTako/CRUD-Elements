<?php
    include('cnct.php');
    if(isset($_POST['factors'])){
        $_SESSION['factorw']=$_POST['weightfactor'];
        $_SESSION['factorv']=$_POST['volumefactor'];
        header("Location:userpage.php");
    }
?>