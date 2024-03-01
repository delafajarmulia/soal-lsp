<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM penyewaan WHERE id=$id");

    if($query){
        header("location:index.php?msg=hapus");
    }
?>