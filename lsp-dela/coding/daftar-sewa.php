<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan Armada</title>
    <link rel="stylesheet" href="css/daftar-sewa.css">
</head>
<body>
    <?php
        // menginclude file navbar.php yang akan dijadikan navbar
        include_once 'navbar.php';
    ?>
    <h1 class="title">Penyewaan Armada</h1>
    <div class="srt-src">
        <div class="srt">
            <form action="" method="post">
                <button type="submit" name="sort">Urutkan</button>
            </form>
        </div>
        <div class="src">
            <form action="" method="post">
                <input type="date" name="key-search" id="">
                <button type="submit" name="search">Cari</button>
            </form>
        </div>
    </div>
    <div class="alert">
        <?php
            // untuk mengecek header parameter agar dapat menampilkan status keberhasilan eksekusi data
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                if($msg == 'update'){
                    echo 'berhasil memperbarui data';
                }else if($msg == 'delete'){
                    echo 'berhasil menghapus data';
                }
            }
        ?>
    </div>
    <table class="table-history">
        <tr>
            <th>ID</th>
            <th>Nama Peminjam</th>
            <th>NIK</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Nomor Armada</th>
            <th>Nama Armada</th>
            <th>Tanggal Pinjam</th>
            <th>Durasi</th>
            <th>Dengan Supir</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            include 'connector.php';

            $sql = "SELECT p.id AS id, p.armada_id AS no_armada, nik, p.nama AS nama_penyewa, no_hp, alamat, 
                    tgl_pinjam, durasi, with_supir, status, a.nama AS nama_armada
                    FROM penyewaans AS p
                    LEFT JOIN armadas AS a ON p.armada_id = a.id";
            $execute = mysqli_query($conn, $sql);
            $datas = mysqli_fetch_all($execute, MYSQLI_ASSOC);

            if(isset($_POST['sort'])){
                $sql = "SELECT p.id AS id, p.armada_id AS no_armada, nik, p.nama AS nama_penyewa, no_hp, alamat, tgl_pinjam, 
                    durasi, with_supir, status, a.nama AS nama_armada
                    FROM penyewaans AS p
                    LEFT JOIN armadas AS a ON p.armada_id = a.id";
                $execute = mysqli_query($conn, $sql);
                $datas = mysqli_fetch_all($execute, MYSQLI_ASSOC);
                $lenght = count($datas);

                for($i=0; $i<$lenght; $i++){
                    $swap = false;
                    for($j=0; $j<$lenght-$i-1; $j++){
                        if($datas[$j]['tgl_pinjam'] > $datas[$j+1]['tgl_pinjam']){
                            $temp = $datas[$j];
                            $datas[$j] = $datas[$j+1];
                            $datas[$j+1] = $temp;
                            $swap = true;
                        }
                    }
                    if($swap == false)
                        break;
                }

                refresh($datas);
            }else if(isset($_POST['search'])){
                $key = $_POST['key-search'];
                $result = [];
                $sql = "SELECT p.id AS id, p.armada_id AS no_armada, nik, p.nama AS nama_penyewa, no_hp, alamat, 
                    tgl_pinjam, durasi, with_supir, status, a.nama AS nama_armada
                    FROM penyewaans AS p
                    LEFT JOIN armadas AS a ON p.armada_id = a.id";
                $execute = mysqli_query($conn, $sql);
                $datas = mysqli_fetch_all($execute, MYSQLI_ASSOC);

                for($i=0; $i<count($datas); $i++){
                    if($datas[$i]['tgl_pinjam'] == $key){
                        array_push($result, $datas[$i]);
                    }
                }
                
                refresh($result);
            }else{
                refresh($datas);
            }

            function refresh($datas){ 
                for($i=0; $i<count($datas); $i++){ 
                    $id = $datas[$i]['id']; 
                    $status = $datas[$i]['status']; ?>
                    <tr>
                        <td><?php echo $datas[$i]['id'];?></td>
                        <td><?php echo $datas[$i]['nama_penyewa'];?></td>
                        <td><?php echo $datas[$i]['nik'];?></td>
                        <td><?php echo $datas[$i]['no_hp'];?></td>
                        <td><?php echo $datas[$i]['alamat'];?></td>
                        <td><?php echo $datas[$i]['no_armada'];?></td>
                        <td><?php echo $datas[$i]['nama_armada'];?></td>
                        <td><?php echo $datas[$i]['tgl_pinjam'];?></td>
                        <td><?php echo $datas[$i]['durasi'];?> hari</td>
                        <td><?php echo $datas[$i]['with_supir'];?></td>
                        <td><?php echo $datas[$i]['status'];?></td>
                        <td>
                            <a href="edit-status.php?id=<?php echo $id; ?>&&sts=<?php echo $status; ?>" class="update">Ubah Status</a> |
                            <a href="hapus.php?id=<?php echo $id; ?>" class="delete">Hapus</a> 
                        </td>
                    </tr>
        <?php   }
            }
        ?>
    </table>
</body>
</html>