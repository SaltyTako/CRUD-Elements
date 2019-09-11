<?php
    session_start();

    $connection = mysqli_connect(
        'localhost:3306',
        'root',
        'pass1',
        'chemical')
        or
        die(mysqli_erro($mysqli));
?>