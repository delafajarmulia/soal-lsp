<?php
    include 'connector.php';

    $id = $_GET['id'];

    if($_GET['sts'] == 'disetujui'){
        $query = mysqli_query($conn, "UPDATE penyewaans SET status='belum_disetujui' WHERE id=$id");
        if(!$query){
            echo '<script>      
                alert("gagal mengupdate data")
            </script>';
        }else{
            header("location:daftar-sewa.php?msg=update");
        }
    }else{
        $query = mysqli_query($conn, "UPDATE penyewaans SET status='disetujui' WHERE id=$id");
        if(!$query){
            echo '<script>
                alert("gagal mengupdate data")
            </script>';
        }else{
            header("location:daftar-sewa.php?msg=update");
        }
    }
?>