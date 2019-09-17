<?php include('includes/header.php'); ?>

    <div class="container-fluid text-center">
        
        <div class="row">
            <div class="offset-md-5 row-md-4">
                <h2>Registrarse</h2>
                <hr>    
                    <!--Register-->
                    <form action="sv.php" method="post">
                        <div class="form-group">
                            <input type="text" name="Username" placeholder="Nombre de usuario"><br>
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" placeholder="Contraseña"><br>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Register" value="Registrarse"><br>    
                        </div>
                    </form>

                <h2>Iniciar sesion</h2>
                <hr>  
                    <!--Login-->
                    <form action="verifier.php" method="post">
                        <div class="form-group">
                            <input type="text" name="Username" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Login" value="Entrar">
                        </div>
                    </form>
                    
            </div>
        </div>
        
        
    </div>
    
    
    <?php
    //TODO list:
    /*
    1-Submit to the database --Done
    2-Encrypt password --Half done, needs password_verify
    3-Protect against MYSQL injection
    4-Verification of email/password
    5-Remember to follow php fig
    */ 
    ?>
<?php include('includes/footer.php'); ?>