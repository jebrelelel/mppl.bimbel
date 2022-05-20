<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
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
        <?php
            require('db.php');
            session_start();

            if(isset($_POST['submit-murid'])) {
                $idMurid = mysqli_real_escape_string($con, $_REQUEST['id']);
                $password = mysqli_real_escape_string($con, $_REQUEST['password']);
                $nama = mysqli_query($con,"select nama from murid where idMurid = '$idMurid'");
                $nama = mysqli_fetch_assoc($nama);
                $_SESSION['nama'] = $nama['nama'];
                $query    = "SELECT * FROM `murid` WHERE idMurid='$idMurid'
                AND password='$password'";
                $result = mysqli_query($con,$query);
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['idMurid'] = $idMurid;
                    header("location: dashboard.php");
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
        <div class="body-reg">
            <form class="login" action="" method="post">
                <input type="text" class="register-input" name="id" placeholder="ID" autofocus="true"
                3 required/>
                <input type="password" class="register-input" name="password" placeholder="Password" required/>
                <input type="submit" class="button-reg" name="submit-murid" value="Login Murid"/>
                <input type="submit" class="button-reg" name="submit-admin" value="Login Admin"/>
            </form>
        </div>
    </body>
</html>