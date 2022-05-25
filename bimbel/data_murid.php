<?php
    require('db.php');
    include("auth_session.php");
    $db= $con;
    $tableName="murid";
    $columns= ['idMurid', 'nama','noHP','email','alamat', 'waktuPendaftaran','password','idProgram', 'idPembayaran'];
    $fetchData = fetch_data($db, $tableName, $columns);
    function fetch_data($db, $tableName, $columns){
    if(empty($db)){
        $msg= "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
    } elseif(empty($tableName)) {
        $msg= "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY idMurid asc";
        $result = $db->query($query);
        if($result== true){ 
            if ($result->num_rows > 0) {
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $row;
            } else {
                $msg= "No Data Found"; 
            }
        } else {
            $msg= mysqli_error($db);
        }
    }
    return $msg;
    }
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8"/>
        <title>Data Murid</title>
        
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
            <li><a href="dashboard_admin.php">HOME</a></li>
            <li><a class="active" href="#">DATA MURID</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </nav>

</header>

<!-- header ends -->

<!-- home  -->

<section class="data-murid" id="home">
    <h1>Data Murid</h1>
    <table class="data-bordered">
        <thead><tr>

            <th>ID Murid</th>
            <th>Nama</th>
            <th>Nomor Handphone</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Waktu Pendaftaran</th>
            <th>Password</th>
            <th>idProgram</th>
            <th>idPembayaran</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                if(is_array($fetchData)){      
                $sn=1;
                foreach($fetchData as $data){
            ?>
            <tr>
            <td><?php echo $data['idMurid']??''; ?></td>
            <td><?php echo $data['nama']??''; ?></td>
            <td><?php echo $data['noHP']??''; ?></td>
            <td><?php echo $data['email']??''; ?></td>
            <td><?php echo $data['alamat']??''; ?></td>
            <td><?php echo $data['waktuPendaftaran']??''; ?></td>
            <td><?php echo $data['password']??''; ?></td>
            <td><?php echo $data['idProgram']??''; ?></td>
            <td><?php echo $data['idPembayaran']??''; ?></td>
            <td>
                <a href="delete.php?del=<?php echo $data['idMurid']; ?>" class="del_btn">Delete</a>
                <a href="edit.php?edit=<?php echo $data['idMurid']; ?>" class="del_btn">Edit</a>
			</td>
            </tr>
            <?php
            // $sn++;
            }}else{ ?>
            <tr>
            <td colspan="9">
            <?php echo $fetchData; ?>
            </td>
            <tr>
            <?php
            }?>
        </tbody>
    </table>
<style>
        .data-murid {
            flex-flow: column;
            position: relative;
            text-align: left;
            border-collapse: collapse;
            font-size: 0.9em;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .data-murid h1 {
            font-size: 3.8rem;
            color:#666;
            text-align: center;
            margin:3rem;
        }

        .data-bordered {
            width: 135rem;
            height: 8rem;
            border: .5rem double rgba(0, 0, 0, 0.856);
            position: relative;
            font-size: 1.4em;
            min-width: 100px;
        }

        .data-bordered thead tr {
            background-color: rgba(37, 37, 37, 0.671);;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .data-bordered th,
        .data-bordered td {
            padding: 12px 17px;
        }

        .data-bordered tbody tr:nth-of-type(even) {
            background-color: #d1d1d1;
        }

        .data-bordered tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
</style>

    <div class="shape"></div>

</section>

<!-- footer -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home">Home</a>
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