<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>login</title>
        
        <!-- main font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

        <!-- font emoji -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


        <link rel="stylesheet" href="css/style.css"/>
</head>
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
            <li><a class="active" href="#">LOGIN</a></li>
            <li><a href="register.php">REGISTER</a></li>
        </ul>
    </nav>


</header>
        <?php
            require('db.php');
            session_start();

            if(isset($_POST['submit-murid'])) {
                $idMurid = mysqli_real_escape_string($con, $_REQUEST['id']);
                $password = mysqli_real_escape_string($con, $_REQUEST['password']);
                $nama = mysqli_query($con,"select nama from murid where idMurid = '$idMurid'");
                $nama = mysqli_fetch_assoc($nama);
                $_SESSION['nama'] = $nama['nama'];
                $query = "SELECT * FROM `murid` WHERE idMurid='$idMurid'
                AND password='$password'";
                $result = mysqli_query($con,$query);
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['id'] = $idMurid;
                    header("location: dashboard.php");
                } else {
                    echo "<div class='form'>
                    <h3>ID/Password salah.</h3><br/>
                    <p class='link'>Klik di sini untuk <a href='login.php'>Login</a> kembali.</p>
                    </div>";
                }
            }

            if(isset($_POST['submit-admin'])) {
                $idAdmin = mysqli_real_escape_string($con, $_REQUEST['id']);
                $password = mysqli_real_escape_string($con, $_REQUEST['password']);
                $namaAdmin = mysqli_query($con,"select namaAdmin from admin where idAdmin = '$idAdmin'");
                $namaAdmin = mysqli_fetch_assoc($namaAdmin);
                $_SESSION['namaAdmin'] = $namaAdmin['namaAdmin'];
                $query = "SELECT * FROM `admin` WHERE idAdmin='$idAdmin'
                AND password='$password'";
                $result = mysqli_query($con,$query);
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['id'] = $idAdmin;
                    header("location: dashboard_admin.php");
                } else {
                    echo "<div class='form'>
                    <h3>ID/Password salah.</h3><br/>
                    <p class='link'>Klik di sini untuk <a href='login.php'>Login</a> kembali.</p>
                    </div>";
                }
            }

            // if(isset($_POST['submit'])) {
            //     $nama = mysqli_real_escape_string($con,$_POST['nama']);
            //     $noHP = mysqli_real_escape_string($con,$_POST['noHP']);
            //     $email = mysqli_real_escape_string($con,$_POST['email']);
            //     $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
            //     $idProgram = mysqli_real_escape_string($con,$_POST['drop-prog']);
            //     $waktuPendaftaran = date("Y-m-d H:i:s");
            //     $password = rand(10000000,99999999);
            //     $query = "INSERT into murid (nama, noHP, email, alamat, idProgram, waktuPendaftaran, password)
            //     VALUES ('$nama', '$noHP', '$email', '$alamat', '$idProgram', '$waktuPendaftaran', '$password')";
            //     $masuk = mysqli_query($con,$query);
            //     $idMurid = mysqli_query($con,"select idMurid from murid where email='$email'");
            //     $idMurid = mysqli_fetch_assoc($idMurid);
            //     $idMurid = $idMurid['idMurid'];
            //     $idPembayaran = 256000 + $idMurid;
            //     // mysqli_query($con,"UPDATE `pembayaran` SET `idPembayaran` = '$idPembayaran' WHERE `murid`.`idMurid` = '$idMurid'");
            //     mysqli_query($con,"insert into pembayaran (idPembayaran, idMurid) values ('$idPembayaran', '$idMurid')");
            //     if ($masuk) {
            //         echo "<div class='form'>
            //         <h3>Pendaftaran berhasil.</h3><br/>
            //         <p class='link'>Klik di sini untuk melanjutkan pembayaran <a href='pembayaran.php?email=$email' class='button-byr'>bayar</a></p>
            //         </div>";
            //     } else {
            //         echo "<div class='form'>
            //         <h3>Yahh, masih ada kolom yang kosong.</h3><br/>
            //         <p class='link'>Klik <a href='register.php'>register</a> untuk registrasi kembali :).</p>
            //         </div>";
            //     }
            // }
        ?>
        <section class="login">
            <div class="login-container">
            <div class="login-box">
            <form class="login-form" action="" method="post">
                <input type="text" class="login-input" name="id" placeholder=" ID" autofocus="true" required/>
                <input type="password" class="login-input" name="password" placeholder=" Password" required/>
                <input type="submit" class="button-login" name="submit-murid" value="Login Murid"/>
                <input type="submit" class="button-login" name="submit-admin" value="Login Admin"/>
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