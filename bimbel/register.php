<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Register</title>
        
        <!-- main font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

        <!-- font emoji -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


        <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

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
        <?php
            require('db.php');
            session_start();
            if(isset($_POST['submit'])) {
                $nama = mysqli_real_escape_string($con,$_POST['nama']);
                $noHP = mysqli_real_escape_string($con,$_POST['noHP']);
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
                $idProgram = mysqli_real_escape_string($con,$_POST['drop-prog']);
                $waktuPendaftaran = date("Y-m-d H:i:s");
                $password = rand(10000000,99999999);
                $query = "INSERT into murid (nama, noHP, email, alamat, idProgram, waktuPendaftaran, password)
                VALUES ('$nama', '$noHP', '$email', '$alamat', '$idProgram', '$waktuPendaftaran', '$password')";
                $masuk = mysqli_query($con,$query);
                $idMurid = mysqli_query($con,"select idMurid from murid where email='$email'");
                $idMurid = mysqli_fetch_assoc($idMurid);
                $idMurid = $idMurid['idMurid'];
                $idPembayaran = 256000 + $idMurid;
                $_SESSION['email'] = $email;
                // mysqli_query($con,"UPDATE `pembayaran` SET `idPembayaran` = '$idPembayaran' WHERE `murid`.`idMurid` = '$idMurid'");
                mysqli_query($con,"insert into pembayaran (idPembayaran, idMurid) values ('$idPembayaran', '$idMurid')");
                if ($masuk) {
                    header("location: pembayaran.php");
                    // echo "<div class='form'>
                    // <h3>Pendaftaran berhasil.</h3><br/>
                    // <p class='link'>Klik di sini untuk melanjutkan pembayaran <a href='pembayaran.php?email=$email' class='button-byr'>bayar</a></p>
                    // </div>";
                } else {
                    header("location: register.php");
                }
            }
        ?>
        <section class="body-reg">
            <form class="register" action="" method="post">
                <h2 class="body-title">Pendaftaran Bimbel Nusantara TP 2024/2025</h2>
                <p class="register-title"><strong>Nama Lengkap</strong></p>
                <input type="text" class="register-input" name="nama" required/>
                <p class="register-title"><strong>Nomor Handphone</strong></p>
                <input type="text" class="register-input" name="noHP" required/>
                <p class="register-title"><strong>Email</strong></p>
                <input type="text" class="register-input" name="email" required/>
                <p class="register-title"><strong>Alamat</strong></p>
                <input type="text" class="register-input" name="alamat" required/>
                <p class="register-title"><strong>Program</strong></p>
                <select name="drop-prog" required>
                    <option value="">--Silahkan pilih program--</option>
                    <?php
                        $list=mysqli_query($con,"select * from program order by idProgram asc");
                        while($row_list=mysqli_fetch_assoc($list)) {
                        ?> 
                    <option value="<?php echo $row_list['idProgram']; ?>">  
                        <?php echo $row_list['namaProgram'];?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
                <input type="submit" class="button-reg" name="submit" value="Register"/>
            </form>
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