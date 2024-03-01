<?php
include_once("koneksi.php");//menghubungkan dengan koneksi 

if( !isset($_GET['id'])){// saat dipencet maka akan mengambil data yang ingin di edit
    header('Location: data berhasil diedit');

}

$id = $_GET['id']; // untuk mendapatkan id dari data yang ingin diedit

$sql = "SELECT * FROM penyewaan WHERE id = $id";
$query =mysqli_query ($db, $sql);
$data = mysqli_fetch_assoc($query);
 // untuk menyimpan data agar otomatis masuk pada form edit data dan yang diedit hanya tanggal kembali dan status.

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
  <!-- bagian navbar -->

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
                text-align: center;"> FORMULIR EDIT PENYEWAAN ARMADA </h2>
    <div class="container" style="margin-top: 80px">
      <div  class="row">
        <div class="col-md-8 offset-md-2">
          <div style = "margin-buttom:20px;" class="card">
            <div class="card-header" style = "background:  #0596a0">
              <font color="white">EDIT DATA ARMADA YANG INGIN DISEWA</font> 
            </div>
            <div class="card-body">
        <div class="mb-3">
          <form action="editData.php" method="POST">

  <!-- <label class="form-label">NO PEMINJAMAN</label> -->
  <input type="hidden" value="<?php echo $data['id'] ?>" name= "id" class="form-control" type="number" id="formFile">
</div>
<div class="mb-3">
  <label class="form-label"> NAMA PENYEWA</label>
  <input readonly name= "penyewa" class="form-control" type="text" id="formFile" required value="<?php echo $data['nama_penyewa'] ?>">
</div>
<div class="mb-3">
  <label class="form-label">NO.HP</label>
  <input readonly name= "no_hp" class="form-control" type="text" id="formFile" required value="<?php echo $data['no'] ?>">
</div>
<div class="mb-3">
  <label class="form-label">NIK</label>
  <input readonly name= "nik" class="form-control" type="number" id="formFile" required value="<?php echo $data['nik'] ?>">
</div>
<div class="mb-3">
  <label class="form-label"> ALAMAT</label>
  <input readonly name= "alamat" class="form-control" type="text" id="formFile" required value="<?php echo $data['alamat'] ?>">
</div>
<div class="mb-3">
  <label class="form-label">TANGGAL PENYEWAAN</label>
  <input readonly name= "tgl_sewa" class="form-control" type="date" id="formFile" required value="<?php echo $data['tgl_sewa'] ?>">
</div>
<div class="mb-3">
  <label class="form-label"> DURASI</label>
  <input readonly name= "durasi" class="form-control" type="text" id="formFile" required value="<?php echo $data['durasi'] ?>">
</div>
<div class="mb-3">
<label class="form-label"> ARMADA</label>
<input readonly name= "armada" class="form-control" type="text" id="formFile" required value="<?php echo $data['armada_id'] ?>">
</div>
<div class="mb-3">
<label class="form-label">Sewa Sopir</label>
<input readonly name= "sopir" class="form-control" type="text" id="formFile" required value="<?php echo $data['sopir'] ?>">
</div>
<div class="mb-3">
<label class="form-label">Status</label>
<select name = "status" class="form-select" aria-label="Default select example">
  <option selected>Pilih</option>
  <option value="setuju">Disetujui</option>
  <option value="tidak setuju">Tidak Disetujui</option>
</select>
</div>


<!-- hidden button -->
<br>
    <button name="submit" value="kirim" type="submit" class="btn btn-success">SIMPAN</button>
    <button type="reset" class="btn btn-warning">RESET</button>
</form>
        
</html>