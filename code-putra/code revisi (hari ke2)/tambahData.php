<?php
include_once("koneksi.php"); //koneksi database
if(isset($_POST['submit'])){ 
//jika dipencet submit maka akan menjalankan fungsi dibawah
$No         = $_POST['No'];//menyimpan hasil form input nomer ke variabel $No  
$penyewa    = $_POST['penyewa'];//menyimpan hasil form input nama penyewa ke variabel $penyewa 
$no      = $_POST['no_hp'];//menyimpan hasil form input nomer telpon ke variabel $no 
$nik       = $_POST['nik'];//menyimpan hasil form input nik ke variabel $nik 
$alamat      = $_POST['alamat'];//menyimpan hasil form input alamat ke variabel $alamat
$tgl_sewa      = $_POST['tgl_sewa'];//menyimpan hasil form input tanggal penyewaan ke variabel $tgl_sewa 
$durasi     = $_POST['durasi'];//menyimpan hasil form input durasi ke variabel $durasi 
$armada     = $_POST['armada'];//menyimpan hasil form input armada ke variabel $armada 
$sopir     = $_POST['sopir'];//menyimpan hasil form input sopir ke variabel $sopir
$status     = $_POST['status'];//menyimpan hasil form input status ke variabel $status 

//syntax sql untuk menambahkan data
$query = "INSERT INTO `penyewaan` (`id`, `nama_penyewa`, `no`, `tgl_sewa`, `durasi`, `alamat`, `nik`, `armada_id`, `sopir`, `status`)VALUES ('$No','$penyewa','$no ','$tgl_sewa','$durasi','$alamat','$nik','$armada','$sopir','$status')";

if($db->query($query)) {
    header("location: dashboardUser.php");

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
    <title>FORM PENYEWAAN (Sistem Penyewaan Armada Transportasi)</title>
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
                text-align: center;"> FORMULIR PENYEWAAN ARMADA UCHIHA </h2>
    <div class="container" style="margin-top: 80px">
      <div  class="row">
        <div class="col-md-8 offset-md-2">
          <div style = "margin-buttom:20px;" class="card">
            <div class="card-header" style = "background:  #0596a0">
              <font color="white">TAMBAH DATA ARMADA YANG INGIN DISEWA</font> 
            </div>
            <div class="card-body">
        <div class="mb-3">
    <!-- Form Peminjaman Armada -->
<form action="tambahData.php" method="POST">

  <!-- <label class="form-label">NO PEMINJAMAN</label> -->
  <input type="hidden" name= "No" class="form-control" type="number" id="formFile">
</div>
<div class="mb-3">
  <label class="form-label"> NAMA PENYEWA</label>
  <input name= "penyewa" class="form-control" type="text" id="formFile" required>
</div>
<div class="mb-3">
  <label class="form-label">NO.HP</label>
  <input name= "no_hp" class="form-control" type="number" id="formFile"  required>
</div>
<div class="mb-3">
  <label class="form-label">NIK</label>
  <input name= "nik" class="form-control" type="number" id="formFile" required>
</div>
<div class="mb-3">
  <label class="form-label"> ALAMAT</label>
  <input name= "alamat" class="form-control" type="text" id="formFile" required>
</div>
<div class="mb-3">
  <label class="form-label">TANGGAL PENYEWAAN</label>
  <input name= "tgl_sewa" class="form-control" type="date" id="formFile" required>
</div>
<div class="mb-3">
  <label class="form-label"> DURASI</label>
  <input name= "durasi" class="form-control" type="text" id="formFile" required>
</div>
<div class="mb-3">
<label class="form-label"> ARMADA</label>
<select name = "armada" class="form-select" aria-label="Default select example" required>
  <option selected>Pilih Armada</option>
  <option value="1">1.Bus Pariwisata</option>
  <option value="2">2.Travel</option>
  <option value="3">3.Mobil Toyota Supra</option>
  <option value="4">4.Mobil Nissan GTR R-35</option>
</select>
</div>
<div class="mb-3">
<label class="form-label">Sewa Sopir</label>
<select name = "sopir" class="form-select" aria-label="Default select example"required>
  <option selected>Pilih</option>
  <option value="Pakai Supir">Ya</option>
  <option value="tidak Memakai Supir">Tidak</option>
</select>
</div>
<input value = "Belum disetujui" name= "status" class="form-control" type="hidden" id="formFile" required>

<!-- hidden button -->
<br>
    <button name="submit" value="kirim" type="submit" class="btn btn-success">SIMPAN</button>
    <button type="reset" class="btn btn-warning">RESET</button>
</form>
        
</html>