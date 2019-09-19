<?php
    include('cnct.php');
    if(isset($_POST['factors'])){
        if(empty($_POST['weightfactor']) && empty($_POST['volumefactor'])){
            //Nothing to do, message to session
            header("Location:userpage.php");
        }else if(empty($_POST['weightfactor']) && !empty($_POST['volumefactor'])){
            $_SESSION['factorv']=$_POST['volumefactor'];
        }else if(!empty($_POST['weightfactor']) && empty($_POST['volumefactor'])){
            $_SESSION['factorw']=$_POST['weightfactor'];
        }else if(!empty($_POST['weightfactor']) && !empty($_POST['volumefactor'])){
            $_SESSION['factorw']=$_POST['weightfactor'];
            $_SESSION['factorv']=$_POST['volumefactor'];
        }
        
        
        header("Location:userpage.php");
    }
?>