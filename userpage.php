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
            </div>        
            <!--Elements from the table-->
        </div>
        <div class="container">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
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
                        while($row = $res->fetch_assoc()){
                            //At this point, we display al the elements
                            //Now, it's time for a modal to pop-up and save some information
                            //Testing new username
                            ?>
                            <tr>
                                <td><?php echo$row['Nombre']; ?></td>
                                <td><?php echo$row['Densidad']; ?></td>
                                <td><?php echo$row['Peso']; ?></td>
                                <td></td>
                                <td><?php echo$row['Time']; ?></td>
                            </tr>
                            
                        <?php }
                        ?>
                        </tbody>
                    </thead>
                </table>
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