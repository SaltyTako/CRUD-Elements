<?php
    include('cnct.php');
    
    //Prepared statement gotta test later
    $sve = $connection->prepare("INSERT INTO user(Nm, K) VALUES(?,?)");
    $sve->bind_param("ss",$sj,$ac);
    //Execute
    if(isset($_POST['Login'])){
        $sj = $_POST['Username'];
        $unpac = $_POST['Password'];
        $dup = mysqli_query($connection,"SELECT Nm FROM user WHERE Nm = '$sj'");

        if(mysqli_num_rows($dup)>0){
            //message to session
        }else if(preg_match('/\s/',$unpac)==FALSE && preg_match('/\s/',$sj)==FALSE){
            $ac = password_hash($unpac,PASSWORD_DEFAULT);
            $sve->execute();
            if(!$sve){
                echo "Failed";
            }
        }else{
            //message to session here
        }
        
        header("Location:index.php");
    }

    if(isset($_POST['Save'])){

    }else if(isset($_POST['Return'])){
        header("Location:userpage.php");
    }

    //Here we could add another if statement for the Element
?>