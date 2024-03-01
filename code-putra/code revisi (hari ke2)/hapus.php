<?php

include_once("koneksi.php");

if (isset ($_GET['id'])) { //mengambil id yang ingin dihapus
    $id = $_GET['id'];

    $sql = "DELETE FROM penyewaan WHERE id = $id"; //syntax sql untuk menghapus
    $query = mysqli_query($db, $sql); //menjalan syntax


    if( $query ){
        echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
        // header('Location: index.php');
        
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}


?>