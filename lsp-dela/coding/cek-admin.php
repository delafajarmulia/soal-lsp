<?php
    if(isset($_POST['admin'])){
        if($_POST['username'] == 'admin' && $_POST['pw'] == 'admin123'){
            header("location:daftar-sewa.php");
        }else{
            echo '<script>
                alert("harap isi dengan benar")
            </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan Armada</title>
    <link rel="stylesheet" href="css/cek-admin.css">
</head>
<body>
    <div class="con">
        <?php
            include_once 'navbar.php';
        ?>
        <div class="card">
            <h1 class="title">Penyewaan Armada</h1>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="">Username</label></td>
                        <td><input type="text" name="username" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Password</label></td>
                        <td><input type="password" name="pw" id="" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="admin">Admin</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>