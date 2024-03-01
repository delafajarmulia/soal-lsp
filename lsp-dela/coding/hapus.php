<?php
    include 'connector.php';

    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM penyewaans WHERE id=$id");

    if(!$query){
        echo '<script>
                alert("gagal menghapus data")
            </script>';
    }else{
        header("location:daftar-sewa.php?msg=delete");
    }
?>