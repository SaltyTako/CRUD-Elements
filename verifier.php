<?php
    //Here, we check credentials
    include("cnct.php");
    $retrieveus = $_POST['Username'];
    $retrievepass = $_POST['Password'];

    //Prepared statement

    $usnm = mysqli_query($connection,"SELECT Nm FROM user WHERE Nm = '".$retrieveus."'");
    $pss = mysqli_query($connection,"SELECT K FROM user WHERE Nm = '".$retrieveus."'");
    $id = mysqli_query($connection,"SELECT ID FROM user WHERE Nm = '".$retrieveus."'");
    while($row = $usnm->fetch_assoc()){
        $defUsername = $row['Nm'];
    }
    while($row = $pss->fetch_assoc()){
        $defPass = $row['K'];
    }
    while($row = $id->fetch_assoc()){
        $defid = $row['ID'];
    }
    
    if(empty($defUsername)){
        //User doesn't exist
        header("Location:index.php");
    }else{
        if($defUsername == $retrieveus){
            if(password_verify($retrievepass,$defPass)){
                //Head to userpage
                header("Location:userpage.php");
                //Set username for userpage
                $_SESSION['user_name']=$defUsername;
                $_SESSION['user_id']=$defid;
                exit();
            }else{
                //Head to index with session message, user doesn't match
                header("Location:index.php");
                exit();
            }
        }
    }

    
    

?>