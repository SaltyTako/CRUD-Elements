<?php 
    include('cnct.php');
    $sresults = $connection->prepare("SELECT * FROM elementos WHERE Nombre = ?");
    $sresults->bind_param("s",$search);
    if(isset($_POST['search']) && isset($_POST['searchfield'])){
        $search = $_POST['searchfield'];
        $sresults->execute();
        $sresults->get_results();
        if(!$sresults){
            //message to session here, telling that there's no elements to display
        }else{
            while($row = $sresults->fetch_assoc()){
                //Here goes a print of the results, plus buttons to return
            }
        }
    }else{
        //message to session, telling that there's nothing to search
    }
?>