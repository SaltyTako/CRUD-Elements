<?php include('includes/header.php'); ?>
    <form action="sv.php" method="post">
    <input type="text" name="Username" placeholder="Username or Email">
    <input type="password" name="Password" placeholder="Password">
    <input type="submit" name="Login">
    </form>
    <div>
    <form action="verifier.php" method="post">
    <input type="text" name="Username" placeholder="Username or Email">
    <input type="password" name="Password" placeholder="Password">
    <input type="submit" name="Login">
    </form>
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