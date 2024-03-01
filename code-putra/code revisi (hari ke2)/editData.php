<?php
include('koneksi.php'); // menghubungkan kedatabase
if(isset($_POST['submit'])){ 
    $id = $_POST['id']; //mengambil id dari form edit
    $status = $_POST['status']; // mengambil data status dari form edit 

    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = "UPDATE penyewaan SET `status` = '$status' WHERE id = $id";
    //query untuk mengedit status dan tanggal kembali ke database
    $result = mysqli_query($db, $query);

    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($query).
                        " - ".mysqli_error($query));
    } 
    else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
?>