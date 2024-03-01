<?php
$conn = mysqli_connect('localhost', 'root', '', 'penyewaan_armada');

if(!$conn){
    die("koneksi gagal! ".mysqli_connect_error());
}
?>