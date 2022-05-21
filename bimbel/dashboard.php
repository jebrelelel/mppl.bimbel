<?php
    require('db.php');
    include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Laman Murid</title>
        
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

    <a href="#" class="logo"></i>BIMBEL NUSANTARA</a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#">HOME</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

</header>

<!-- header ends -->

<!-- home  -->

<section class="home" id="home">
    
    <h1>Halo <?php echo $_SESSION['nama']."!" ?></h1>

    <div class="shape"></div>

</section>

<!-- home  ends -->

<!-- program  -->



<!-- program ends -->


<!-- footer -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
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