<?php
    require('db.php');
    session_start();
    
    $email = $_SESSION['email'];
    $idProgramCust = mysqli_query($con,"select idProgram from murid where email = '$email'");
    $idProgramCust = mysqli_fetch_assoc($idProgramCust);
    $idProgramCust = $idProgramCust['idProgram'];
    $biaya = mysqli_query($con,"select biaya from program where idProgram = '$idProgramCust'");
    $biaya = mysqli_fetch_assoc($biaya);
    $biaya = $biaya['biaya'];
    $nama = mysqli_query($con,"select nama from murid where email = '$email'");
    $nama = mysqli_fetch_assoc($nama);
    $nama = $nama['nama'];
    $idMurid = mysqli_query($con,"select idMurid from murid where email='$email'");
    $idMurid = mysqli_fetch_assoc($idMurid);
    $idMurid = $idMurid['idMurid'];
    $idPembayaran = 256000 + $idMurid;
?>

<!DOCTYPE html>
<html>
<body>
    <head>
            <meta charset="utf-8"/>
            <title>Pembayaran</title>
            
            <!-- main font -->
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

            <!-- font emoji -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


            <link rel="stylesheet" href="css/style.css"/>
    </head>

    <!-- header -->

    <header>

    <div id="menu" class="fas fa-bars"></div>

    <a href="index.php" class="logo"></i>BIMBEL NUSANTARA</a>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php #program">PROGRAM</a></li>
            <li><a href="login.php">LOGIN</a></li>
            <li><a class="active" href="register.php">REGISTER</a></li>
        </ul>
    </nav>

    </header>

    <!-- header ends -->
    <section class="body-bayar">
        <h2 class="bayar-title"><strong>Pendaftaran Bimbel Nusantara TP 2024/2025</strong></h2>
        <div class="bayar">
            <p class="isi-bayar" style='text-align: left'><strong>Nama Pendaftar</strong> 
            <span style="float:right;"><?php echo $nama;?></span></p>
            <p class="isi-bayar"style='text-align: left'><strong>Biaya</strong>
            <span style="float:right;"><?php echo "Rp ".$biaya;?></span></p>
            <p class="isi-bayar"style='text-align: left'><strong>Kode Pembayaran</strong>
            <span style="float:right;"><?php echo $idPembayaran?></span></p>
        </div>
    </section>

    <!-- footer -->

    <div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home">Home</a>
            <a href="#program">Program</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <p> <i class="fa fa-map-marker-alt"></i> Gondokusuman, Yogyakarta 14211 </p>
            <p> <i class="fa fa-envelope"></i> nusantara@bimbel.com </p>
            <p> <i class="fa fa-phone"></i> +123-456-7890 </p>
        </div>
    </div>
    </div>

    <!-- footer ends -->

</body>
</html>
