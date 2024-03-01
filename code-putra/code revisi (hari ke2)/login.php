<!DOCTYPE html>
<html>
<head>
 <title>Login Penyewaan Armada</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">  
 <style>
body{
 font-family: sans-serif;
 background:  #E0FFFF;
}
 
h1{
 text-align: center;
 /*ketebalan font*/
 font-weight: 300;
}
 
.tulisan_login{
 text-align: center;
 /*membuat semua huruf menjadi kapital*/
 text-transform: uppercase;
}
 
.kotak_login{
 width: 350px;
 background: white;
 /*meletakkan form ke tengah*/
 margin: 80px auto;
 padding: 30px 20px;
 border-radius:8px;
 box-shadow: 0px 0px 100px 4px #d6d6d6;
}
 
label{
 font-size: 11pt;
}
 
.form_login{
 /*membuat lebar form penuh*/
 box-sizing : border-box;
 width: 100%;
 padding: 10px;
 font-size: 11pt;
 margin-bottom: 20px;
}
 
.tombol_login{
 background: #2aa7e2;
 color: white;
 font-size: 11pt;
 width: 100%;
 border: none;
 border-radius: 3px;
 padding: 10px 20px;
}
.tombol_sign{
 background: green;
 color: white;
 font-size: 11pt;
 width: 100%;
 border: none;
 border-radius: 3px;
 padding: 10px 20px;
 margin-top: 10px;
}
 
.link{
 color: #232323;
 text-decoration: none;
 font-size: 10pt;
}
 
.alert{
 background: #e44e4e;
 color: white;
 padding: 10px;
 text-align: center;
 border:1px solid #b32929;
}
  </style>  
</head>
<body>
 
 <?php 
 if(isset($_GET['pesan'])){
 if($_GET['pesan']=="gagal"){
 echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
 }
 }
 ?>
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
 
 <div class="kotak_login">
 <p class="tulisan_login">Silahkan login</p>
 
 <form action="plogin.php" method="post">
 <label>Email</label>
 <input type="text" name="email" class="form_login" placeholder="Email .." required="required">
 
 <label>Password</label>
 <input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
 <input type="submit" class="tombol_login" value="LOGIN">
 


 </form>
 <a href = "sign.php"><input type="submit" class="tombol_sign" value="SIGN"></a>
 <p>Jika belum punya akun silahkan sign/registrasi dahulu<font style = "color:#b32929;">*</font><p>
 
 </div>
 
 
</body>
</html>