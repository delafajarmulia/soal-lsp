<?php
include_once("koneksi.php");
if(isset($_POST['submit'])){
$No         = $_POST['No'];
$email    = $_POST['email'];
$password      = $_POST['password'];
$role   = $_POST['role'];



$query = "INSERT INTO `user`(`id`, `email`, `password`, `role`) VALUES ('$No','$email','$password','$role')";

if($db->query($query)) {
    header("location: login.php");

} else {
    echo "Data Gagal Disimpan!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penyewaan Armada Transportasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">  
</head>
<body style="background-color: #E0FFFF; ">
  <!-- bagian navbar jamet -->

  <nav class="navbar navbar-expand-lg navbar-dark" style = "background: #0596a0; height: 85px;">
  <div class="container">
    <a style = "font-size: 34pt;" class="navbar-brand" href="#">
            Armada.Id</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      
    </div>
  </div>
</nav>
<h2 style = "margin-top:50px;
                text-align: center;"> FORMULIR PENDAFTARAN AKUN</h2>
    <div class="container" style="margin-top: 80px">
      <div  class="row">
        <div class="col-md-8 offset-md-2">
          <div style = "margin-buttom:20px;" class="card">
            <div class="card-header" style = "background:  #0596a0">
              <!-- <font color="white">TAMBAH DATA ARMADA YANG INGIN DISEWA</font>  -->
            </div>
            <div class="card-body">
        <div class="mb-3">
          <form action="sign.php" method="POST">

  <!-- <label class="form-label">NO PEMINJAMAN</label> -->
  <input type="hidden" name= "No" class="form-control" type="number" id="formFile">
</div>
<div class="mb-3">
  <label class="form-label"> EMAIL</label>
  <input name= "email" class="form-control" type="text" id="formFile" required>
</div>
<div class="mb-3">
  <label class="form-label">PASSWORD</label>
  <input name= "password" class="form-control" type="password" id="formFile" required>
</div>
<input value = "user" name= "role" class="form-control" type="hidden" id="formFile" required>
<!-- hidden button -->
<br>
    <button name="submit" value="kirim" type="submit" class="btn btn-success">SIMPAN</button>
    <button type="reset" class="btn btn-warning">RESET</button>
    <p style = "margin-top:10px;">Jika Sudah punya akun silahkan login </p>
    <a href = "login.php"><button type="button" class="btn btn-info">Login</button></a>
</form>