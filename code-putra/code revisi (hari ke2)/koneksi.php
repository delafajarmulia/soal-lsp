<?php
  $host = "localhost"; //nama server
  $user = "root"; // nama server
  $pass = ""; //nama password
  $nama_db = "db_penyewaan(2)"; //nama database
  $db = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$db){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }

 
?>