<?php
    require('db.php');
    include("auth_session.php");
    if (isset($_GET['del'])) {
        $idMurid = $_GET['del'];
        mysqli_query($con, "DELETE FROM murid WHERE idMurid=$idMurid");
        header('location: data_murid.php');
        $message = "Data Murid dihapus!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>