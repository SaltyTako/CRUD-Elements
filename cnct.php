<?php
    session_start();
    define('FPDF_FONTHPATH','/CRUD-Elementos/includes/font/');
    include('includes/fpdf.php');
    $connection = mysqli_connect(
        'localhost:3306',
        'root',
        'pass1',
        'chemical')
        or
        die(mysqli_erro($mysqli));
?>