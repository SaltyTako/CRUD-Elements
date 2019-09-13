<?php
    include('includes/header.php');
    include('cnct.php');
?>

<form action="sv.php" method="post">
<input type="text" name="element_name" placeholder="Nombre del Elemento">
<input type="number" name="density" placeholder="Densidad" step="0.01" min=0>
<input type="submit" name="Save" value="Guardar">
<input type="submit" name="Return" value="Cancelar">
</form><br>

<?php include('includes/footer.php'); ?>