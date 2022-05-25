<?php
    require('db.php');
    include("auth_session.php");

    $idMurid = $_GET['edit'];
    $result = mysqli_query($con,"select * from murid where idMurid = $idMurid");
    while($dataMurid = mysqli_fetch_array($result)) {
        $nama = $dataMurid['nama'];
        $noHP = $dataMurid['noHP'];
        $email = $dataMurid['email'];
        $alamat = $dataMurid['alamat'];
        $idProgram = $dataMurid['idProgram'];
    }

    if(isset($_POST['update'])) {
        $nama = mysqli_real_escape_string($con,$_POST['nama']);
        $noHP = mysqli_real_escape_string($con,$_POST['noHP']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $alamat = mysqli_real_escape_string($con,$_POST['alamat']);
        $idProgram = mysqli_real_escape_string($con,$_POST['drop-prog']);
        $query = "update murid set nama = '$nama', noHP = '$noHP', email = '$email', alamat = '$alamat', idProgram = '$idProgram' where idMurid = '$idMurid'";
        $masuk = mysqli_query($con,$query);
        header("location: data_murid.php");

    }
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Edit Data Murid</title>
        
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
            <li><a href="#home">HOME</a></li>
            <li><a class="active" href="data_murid.php">DATA MURID</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

</header>
        <?php
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
            //     $_SESSION['email'] = $email;
            //     $idMurid = mysqli_query($con,"select idMurid from murid where email='$email'");
            //     $idMurid = mysqli_fetch_assoc($idMurid);
            //     $idMurid = $idMurid['idMurid'];
            //     $idPembayaran = 256000 + $idMurid;
            //     mysqli_query($con,"UPDATE `murid` SET `idPembayaran` = '$idPembayaran' WHERE `murid`.`idMurid` = '$idMurid'");
            //     if ($masuk) {
            //         header("location: pembayaran.php");
            //         // echo "<div class='form'>
            //         // <h3>Pendaftaran berhasil.</h3><br/>
            //         // <p class='link'>Klik di sini untuk melanjutkan pembayaran <a href='pembayaran.php?email=$email' class='button-byr'>bayar</a></p>
            //         // </div>";
            //     } else {
            //         header("location: register.php");
            //     }
            // }
        ?>
        <section class="body-reg">
            <form class="register" action="" method="post">
                <h2 class="body-title">Update Data Murid Bimbel Nusantara</h2>
                <p class="register-title"><strong>Nama Lengkap</strong></p>
                <input type="text" class="register-input" name="nama" value="<?php echo $nama?>" required/>
                <p class="register-title"><strong>Nomor Handphone</strong></p>
                <input type="text" class="register-input" name="noHP" value="<?php echo $noHP?>" required/>
                <p class="register-title"><strong>Email</strong></p>
                <input type="text" class="register-input" name="email" value="<?php echo $email?>" required/>
                <p class="register-title"><strong>Alamat</strong></p>
                <input type="text" class="register-input" name="alamat" value="<?php echo $alamat?>" required/>
                <p class="register-title"><strong>Program</strong></p>
                <select name="drop-prog" value=<?php echo $idProgram?> required>
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
                <input type="submit" class="button-reg" name="update" value="Update"/>
            </form>
        </section>

<!-- footer -->

        <div class="footer">

            <div class="box-container">

                <div class="box">
                    <h3>Quick Links</h3>
                    <a href="#home">Home</a>
                    <a href="data_murid.php">Data Murid</a>
                    <a href="logout.php">Logout</a>
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