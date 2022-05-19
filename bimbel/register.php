<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Register</title>
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
            if(isset($_POST['submit'])) {
                $nama = mysqli_real_escape_string($con,$_POST['nama']);
                $noHP = mysqli_real_escape_string($con,$_POST['noHP']);
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
                $idProgram = mysqli_real_escape_string($con,$_POST['drop-prog']);
                $waktuPendaftaran = date("Y-m-d H:i:s");
                $query = "INSERT into murid (nama, noHP, email, alamat, idProgram, waktuPendaftaran)
                VALUES ('$nama', '$noHP', '$email', '$alamat', '$idProgram', '$waktuPendaftaran')";
                $masuk = mysqli_query($con,$query);
                $db = "SELECT idMurid FROM murid WHERE email=$email";
                if ($masuk) {
                    echo "<div class='form'>
                    <h3>Pendaftaran berhasil.</h3><br/>
                    <p class='link'>Klik di sini untuk melanjutkan pembayaran <a href='pembayaran.php?email=$email' class='button-byr'>bayar</a></p>
                    </div>";
                } else {
                    echo "<div class='form'>
                    <h3>Yahh, masih ada kolom yang kosong.</h3><br/>
                    <p class='link'>Klik <a href='register.php'>register</a> untuk registrasi kembali :).</p>
                    </div>";
                }
            }
        ?>
        <div class="body-reg">
            <form class="register" action="" method="post">
                <h2 class="body-title">Pendaftaran Bimbel Nusantara TP 2024/2025</h2>
                <p class="register-title">Nama Lengkap</p>
                <input type="text" class="register-input" name="nama" required/>
                <p class="register-title">Nomor Handphone</p>
                <input type="text" class="register-input" name="noHP" required/>
                <p class="register-title">Email</p>
                <input type="text" class="register-input" name="email" required/>
                <p class="register-title">Alamat</p>
                <input type="text" class="register-input" name="alamat" required/>
                <p class="register-title">Program</p>
                <select name="drop-prog">
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
        </div>
    </body>
</html>