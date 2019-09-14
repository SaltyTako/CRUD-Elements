<?php
    include("cnct.php");
    include("includes/header.php");
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
            foreach($_POST['check'] as $selected){
                $id = $selected;
                $delete->execute();
                header("Location:userpage.php");
            }
        }
    }else if(isset($_POST['print'])){
        ?>
        <form action="print.php" method="post">
            <div class="container">
                Tamaño de etiqueta
                <div class="form-check">
                <input class="form-check-input" type="radio" name="5x5" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                     5x5
                </label>
                 </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="3x3" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    3x3
                </label>
               </div>
                ¿Desea incluir fecha?
                <input type="checkbox" name="yes">
                <input type="submit" name="print" class="btn btn-success btn-block" value="Imprimir">
                <input type="submit" name="cancel" class="btn btn-success btn-block" value="Cancelar">
            </div>
        </form>
        <?php
    }
    include("includes/footer.php");
?>