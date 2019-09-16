<?php
//Let's get this bread
    include('cnct.php');
    $pdf = new FPDF('P','cm','Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $pdf->SetLeftMargin(3);
    $pdf->SetRightMargin(3);
    $pdf->SetTopMargin(3);
    //Things to do in this algorithm:
    //First, check 5x5 or 3x3
    //Second, check if date is required
    //Third, check if "checkall" is true, if not, go to "check" instead (this is the main if)
    //Inside checkall, we run 2 things
    //first, a while statement, that updates the mysql data every sixth time
    //second, a for statement, that runs 5 times
    
    $sizeofcells = 3;

    if(isset($_POST['Radios'])){
        if($_POST['Radios'] == 5){
            $sizeofcells = 5;
        }else if($_POST['Radios'] == 3){
            $sizeofcells = 3;
        }
    }

    if(isset($_POST['date'])){
        $date = true;
    }else{
        $date = false;
    }
    //Prepared statements
    //all
    $printall = $connection->prepare("SELECT * FROM elementos WHERE UserID = ?");
    $printall->bind_param("i",$usid);
    //selected
    $printone = $connection->prepare("SELECT * FROM elementos WHERE ID=? AND UserID = ?");
    $printone->bind_param("ii",$id,$userid);
    $x = 0;
    //main if
    if(isset($_SESSION['checkall'])){
        $usid = $_SESSION['user_id'];
        $printall->execute();
        $print = $printall->get_result();
        
        $pdf->SetX(9);
        $pdf->SetY(3);
        while($row = $print->fetch_assoc()){
                $name = $row['Nombre'];
                $density = $row['Densidad'];
                if(isset($_SESSION['factorw'])){ 
                    $weight = $row['Densidad'] * $_SESSION['factorw'];
                }else{
                    $weight = $row['Densidad'];
                }
                if(isset($_SESSION['factorv'])){
                    $volume = $row['Densidad'] * $_SESSION['factorv'];
                }else{
                   $volume = $row['Densidad']; 
                }
                //This string contains all the information, including date if required
                if($date == true){
                    $date = $row['Time'];
                }else{
                    $date = "";
                }
                $string = "$name\n$density\n$weight\n$volume\n$date";
                
                
                $pdf->MultiCell($sizeofcells,$sizeofcells/5,$string,1,'J',0);
                //for some reason, it doesnt print here
        }
        $pdf->Output();
    }else if(isset($_SESSION['check'])){

    }
?>