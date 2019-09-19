<?php
    include('cnct.php');
    $name = '';
    $density = 0;

    if(isset($_GET['ID'])){
        $getelement = $connection->prepare("SELECT * FROM elementos WHERE ID = ? AND UserID = ?");
        $getelement->bind_param("is",$id,$_SESSION['user_id']);
        $id = $_GET['ID'];
        $getelement->execute();
        $elemnt = $getelement->get_result();
        if(mysqli_num_rows($elemnt)==1){
            $row = mysqli_fetch_array($elemnt);
            $name = $row['Nombre'];
            $density = $row['Densidad'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['ID'];
        $name = $_POST['name'];
        $density = $_POST['density'];

        $replace = $connection->prepare("UPDATE elementos set Nombre = ? , Densidad = ? WHERE ID=?");
        $replace->bind_param("sdd",$name,$density,$id);
        $replace->execute();
        //Message to session, update sucessful
        header("Location:userpage.php");
    }
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <div class="form-group">
            <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Actualizar nombre">
        </div>
        <div class="form-group">
            <input type="number" name="density" class="form-control" value="<?php echo $density; ?>" placeholder="Actualizar densidad">
        </div>
        <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar">
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>