<?php
    include("db.php");
    $db= $con;
    $tableName="murid";
    $columns= ['idMurid', 'nama','noHP','email','alamat', 'waktuPendaftaran','password','idProgram'];
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
        $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY idMurid DESC";
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
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>

         <th>ID Murid</th>
         <th>Nama</th>
         <th>Nomor Handphone</th>
         <th>Email</th>
         <th>Alamat</th>
         <th>Waktu Pendaftaran</th>
         <th>Password</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['idMurid']??''; ?></td>
      <td><?php echo $data['nama']??''; ?></td>
      <td><?php echo $data['noHP']??''; ?></td>
      <td><?php echo $data['email']??''; ?></td>
      <td><?php echo $data['alamat']??''; ?></td>
      <td><?php echo $data['waktuPendaftaran']??''; ?></td>
      <td><?php echo $data['password']??''; ?></td>
      <td><?php echo $data['idProgram']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>