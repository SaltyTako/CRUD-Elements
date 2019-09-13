<?php
    include("cnct.php");
    $rows = $_SESSION['numrows'];
    $x = 0;
    $delete = $connection->prepare("DELETE FROM elementos WHERE ID=?");
    $delete->bind_param("i",$id);

    $deleteall = $connection->prepare("DELETE FROM elementos WHERE UserID=?");
    $deleteall->bind_param("i",$usid);

    $usid = $_SESSION['user_id'];

    if(isset($_POST['delete'])){
        if(isset($_POST['allcheck'])){
            $deleteall->execute();
            header("Location:userpage.php");
        }else{
            //Here goes the code for individual deletion
        }
    }
?>