<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"select * from user where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
 $data = mysqli_fetch_assoc($login);
 
 // cek jika user login sebagai admin
 if($data['role']=="admin"){
 
 // buat session login dan username
 $_SESSION['email'] = $email;
 $_SESSION['role'] = "admin";
 // alihkan ke halaman dashboard admin
 header("location:index.php");
 
 // cek jika user login sebagai user
 }else if($data['role']=="user"){
 // buat session login dan username
 $_SESSION['email'] = $email;
 $_SESSION['role'] = "user";
 // alihkan ke halaman dashboard pegawai
 header("location:dashboardUser.php");
 
 
 }else{
 
 // alihkan ke halaman login kembali
 header("location:login.php?pesan=gagal");
 } 
}else{
 header("location:login.php?pesan=gagal");
}
 
?>