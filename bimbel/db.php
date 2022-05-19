<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "sistem_bimbel";
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>