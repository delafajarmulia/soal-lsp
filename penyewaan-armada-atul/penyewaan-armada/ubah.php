<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    if($_GET['status'] == 'belum_disetujui'){
        $query = mysqli_query($conn, "UPDATE penyewaan SET status='disetujui' WHERE id='$id'");
        if($query){
            header("location:index.php?msg=ubah");
        }
    } else{
        $query = mysqli_query($conn, "UPDATE penyewaan SET status='belum_disetujui' WHERE id='$id'");
        if($query){
            header("location:index.php?msg=ubah");
        }
    }
?>