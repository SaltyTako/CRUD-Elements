<?php
    include('includes/header.php');
    include('cnct.php');
    //Send all user data through session
    if(isset($_SESSION['user_name'])){
        $name = $_SESSION['user_name'];
        $id = $_SESSION['user_id'];
        //Aparently, we also need the id
        
        ?>
        <div class="container-fluid">
            <br>
            <div class="offset-md-1 row-md-4">
            <h2>Bienvenido/a <?php echo $name ?></h2>
            </div>
            <hr>
            <!--Elements from the table-->
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <form action="add.php" method="post">
                    <div class="form-group">
                        <div class="col-md-3">
                        <input type="submit" name="AddElement" class="btn btn-success btn-block" value="Añadir Elemento">
                        </div>
                        
                    </div>
                </form>
                    <form action="handler.php" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><input id="all" type="checkbox" name="allcheck" value="checkall"></th>
                                    <th>Elemento</th>
                                    <th>Densidad</th>
                                    <th>Peso</th>
                                    <th>Volumen</th>
                                    <th>Fecha de creación</th>
                                    <th>Editar</th>
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
                                                <td><?php echo $row['Time']; ?></td>
                                                <td>
                                                <a href="edit.php?ID=<?php echo $row['ID']; ?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                </td>
                                                
                                            </tr>
                                            
                                        <?php }
                                        $_SESSION['numrows'] = $numrows;
                                        ?>
                                        
                                </tbody>
                            </thead>
                        </table>
                            <div class="row">
                                <div class="form-group">
                                    <input type="submit" name="delete" class="btn btn-success btn-block" value="Borrar seleccionados">
                                    <input type="submit" name="print" class="btn btn-success btn-block" value="Imprimir seleccionados">
                                </div>
                            </div>
                    </form>
                            
                    <form action="logout.php" method="post">
                    <div class="form-group">
                    <input type="submit" name="logout" class="btn btn-danger" value="Cerrar sesion">
                    </div>

                    </form>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <form action="factors.php" method="post">
                    
                        <div class="form-group">
                            <input type="number" name="weightfactor" placeholder="Factor de peso" step="0.01" min=0>
                        </div>

                        <div class="form-group">
                            <input type="number" name="volumefactor" placeholder="Factor de volumen" step="0.01" min=0>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="factors" class="btn btn-success btn-block" value="Guardar factores">
                        </div>
                        <!--Actual Factor Display-->
                        <label for="factors">Factores actuales:</label> <br>
                        <label for="factors">Peso : <?php 
                        if(isset($_SESSION['factorw'])){
                            echo $_SESSION['factorw'];
                        }else{
                            echo 0;
                        }
                        ?></label> <br>
                        <label for="factors">Volumen : <?php 
                        if(isset($_SESSION['factorv'])){
                            echo $_SESSION['factorv'];
                        }else{
                            echo 0;
                        }
                        ?></label>
                    </form> 
                    <form action="search.php" method="post">
                            <div class="form-group">
                            <input type="text" name="searchfield" placeholder="Buscar">
                            </div>
                            <div class="form-group">
                            <input type="submit" name="search" class="btn btn-success btn-block" value="Buscar elemento">
                            </div>                 
                    </form>

                    </div>
                    </div>    
                </div> 
                
                

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