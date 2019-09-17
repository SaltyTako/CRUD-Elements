<?php
    include('includes/header.php');
    include('cnct.php');
?>

    <div class="container-fluid text-center">
        <br>
        <div class="row">
            <div class="offset-md-5 row-md-4">
                <form action="sv.php" method="post">

                <div class="form-group">
                    <input type="text" name="element_name" placeholder="Nombre del Elemento">
                </div>

                <div class="form-group">
                    <input type="number" name="density" placeholder="Densidad" step="0.01" min=0>
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="Save" value="Guardar">
                    <input class="btn btn-primary" type="submit" name="Return" value="Cancelar">
                </div>

                </form>
            </div>
        </div>
    </div>



<?php include('includes/footer.php'); ?>