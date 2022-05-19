<?php
    require('db.php');;
    
    $email = $_GET['email'];
    $idProgramCust = mysqli_query($con,"select idProgram from murid where email = '$email'");
    $idProgramCust = mysqli_fetch_assoc($idProgramCust);
    $idProgramCust = $idProgramCust['idProgram'];
    $biaya = mysqli_query($con,"select biaya from program where idProgram = '$idProgramCust'");
    $biaya = mysqli_fetch_assoc($biaya);
    $biaya = $biaya['biaya'];
    $nama = mysqli_query($con,"select nama from murid where email = '$email'");
    $nama = mysqli_fetch_assoc($nama);
    $nama = $nama['nama'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Pembayaran</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div class="header">
            <h1 class="org-name">BIMBEL NUSANTARA</h1>
            <a href="index.php" class="button">HOME</a>
            <a href="program.php" class="button">PROGRAM</a>
            <a href="login.php" class="button">LOGIN</a>
            <a href="register.php" class="button-spc">REGISTER</a>
        </div>
        <div class="body-reg">
            <h2 class="body-title">Pendaftaran Bimbel Nusantara TP 2024/2025</h2>
            <div class="byr">
                <p class="isi-bayar">Nama Pendaftar: <?php echo $nama;?></p>
                <p class="isi-bayar">Biaya: <?php echo "Rp ".$biaya;?></p>
                <p class="isi-bayar">Kode Pembayaran: <?php echo "turu"?></p>
            </div>
        </div>
    </body>
</html>