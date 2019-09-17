<?php 
    include('cnct.php');
    include('includes/header.php');
    $sresults = $connection->prepare("SELECT * FROM elementos WHERE Nombre = ? AND UserID = ?");
    $sresults->bind_param("si",$search,$id);
    $id = $_SESSION['user_id'];
    if(isset($_POST['search']) && isset($_POST['searchfield'])){
        $search = $_POST['searchfield'];
        $sresults->execute();
        $res = $sresults->get_result();
        $numrows = $res->num_rows;
        if(!$sresults){
            //message to session here, telling that there's no elements to display
            header("Location:userpage.php");
        }else if($numrows==0){
            //message to session, telling that there's nothing to search
            header("Location:userpage.php");
        }else{
                ?>
                    <div class="container">
                        <div class="col-md-8">
                        <br>
                        <h2>Resultados de la búsqueda</h2>
                        <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Elemento</th>
                                        <th>Densidad</th>
                                        <th>Peso</th>
                                        <th>Volumen</th>
                                        <th>Fecha de creacion</th>
                                    </tr>
                                    <tbody>
                                    <?php
                                    while($row = $res->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['Nombre'] ?></td>
                                            <td><?php echo $row['Densidad'] ?></td>
                                            <?php if(isset($_SESSION['factorw'])){
                                                $showdens = $row['Densidad'] * $_SESSION['factorw'];
                                            }else{
                                                $showdens = $row['Densidad'];
                                            } ?>
                                            <td><?php echo $showdens ?></td>
                                            <?php if(isset($_SESSION['factorv'])){ 
                                                    $showvol = $row['Densidad'] * $_SESSION['factorv'];
                                                }else{
                                                        $showvol = $row['Densidad'];
                                                } ?>
                                            <td><?php echo $showvol; ?></td>
                                            <td><?php echo $row['Time']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </thead>
                            </table>
                            <form action="userpage.php">
                            <input class="btn btn-primary" type="submit" value="Regresar">
                            </form>
                        </div>
                    </div>
                <?php
                //Here goes a print of the results, plus buttons to return
            }
    }
    include('includes/footer.php');
?>