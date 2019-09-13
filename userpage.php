<?php
    include('includes/header.php');
    include('cnct.php');
    //Send all user data through session
    if(isset($_SESSION['user_name'])){
        $name = $_SESSION['user_name'];
        $id = $_SESSION['user_id'];
        //Aparently, we also need the id
        echo 'Bienvenido ',$name;
        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2" sizeof="25">
                    <form action="add.php" method="post">
                        <input type="submit" name="AddElement" class="btn btn-success btn-block" value="Añadir Elemento">
                    </form> 
                </div>
                <div class="col-md-2" sizeof="25">
                    <input type="submit" name="SearchElement" class="btn btn-success btn-block" value="Buscar Elemento">
                </div>
                    <form action="factors.php" method="post">
                        <div class="col-md-2" sizeof="25">
                            <input type="number" name="weightfactor" placeholder="Factor de peso" step="0.01" min=0>
                        </div>
                        <div  class="col-md-2" sizeof="25">
                            <input type="number" name="volumefactor" placeholder="Factor de volumen" step="0.01" min=0>
                        </div>
                        <div  class="col-md-2" sizeof="25">
                            <input type="submit" name="factors" class="btn btn-success btn-block" value="Guardar factores">
                        </div>
                    </form>
                    
            </div>        
            <!--Elements from the table-->
        </div>
        <div class="container">
            <div class="col-md-8">
                <form action="delete.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="allcheck" value="checkall"></th>
                                <th>Elemento</th>
                                <th>Densidad</th>
                                <th>Peso</th>
                                <th>Volumen</th>
                                <th>Fecha de creación</th>
                            </tr>
                            <!--Now, here goes the body, where we search for elements-->
                            <tbody>
                                
                                    <?php
                                    $search = $connection->prepare("SELECT * FROM elementos WHERE UserID = ?");
                                    $search->bind_param("i",$id);
                                    $search->execute();
                                    $res = $search->get_result();
                                    $numrows = 0;
                                    while($row = $res->fetch_assoc()){
                                        $numrows++;
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="check[]" value="<?php echo $row['ID'] ?>"></td>
                                            <td><?php echo $row['Nombre']; ?></td>
                                            <td><?php echo $row['Densidad']; ?></td>
                                            <?php if(isset($_SESSION['factorw'])){ 
                                                $showdens = $row['Densidad'] * $_SESSION['factorw'];
                                            }else{
                                                $showdens = $row['Densidad'];
                                            } ?>
                                            <td><?php echo $showdens; ?></td>
                                            <?php if(isset($_SESSION['factorv'])){ 
                                                $showvol = $row['Densidad'] * $_SESSION['factorv'];
                                            }else{
                                                $showvol = $row['Densidad'];
                                            } ?>
                                            <td><?php echo $showvol; ?></td>
                                            <td><?php echo$row['Time']; ?></td>
                                        </tr>
                                        
                                    <?php }
                                    $_SESSION['numrows'] = $numrows;
                                    ?>
                                    
                            </tbody>
                        </thead>
                    </table>
                    <input type="submit" name="delete" value="Borrar seleccionados">
                </form>
            </div>
        </div>
        
        <?php
        
    }else{
        echo "no existe";
    }
?>

<?php
    include('includes/footer.php');
?>