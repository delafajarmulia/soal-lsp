<?php
    include('koneksi.php');
    $no = 1;
    $query = "SELECT p.id, p.nama_penyewa, p.no, p.alamat, p.nik, a.armada, p.tgl_sewa, p.durasi, p.sopir, p.status 
                FROM penyewaan AS p
                LEFT JOIN armada AS a 
                ON p.armada_id=a.id";
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penyewaan Armada Transportasi</title>
    <link rel="stylesheet" href="s2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <header class="header">
            <h1 class="judul"><a href="index.php" class="btn">Armada.Id</a></h1>
        </header>
        <div class="add">
            <div class="btn-add">
                <a href="tambahData.php?sudah"><button class="btn">+Tambah peminjaman</button></a>
            </div>
        </div>    

        <main>
            <h2>Daftar Penyewaan Armada</h2><br>

            
                    <table>
                        <tr>
                                <th>No</th>
                                <th>Penyewa</th>
                                <th>No.Hp</th>
                                <th>Alamat</th>
                                <th>NIK</th>
                                <th>Armada</th>
                                <th>Tanggal Penyewaan</th>
                                <th>Durasi</th>
                                <th>Sopir</th>
                                <th>Status</th>
                        </tr>
                <?php
                    for ($i=0; $i < count($data); $i++) { 
                        $no=$i+1;
                        echo '
                            <tr>
                                <td>'.$no.'</td>
                                <td>'.$data[$i]['nama_penyewa'].'</td>
                                <td>'.$data[$i]['no'].'</td>
                                <td>'.$data[$i]['alamat'].'</td>
                                <td>'.$data[$i]['nik'].'</td>
                                <td>'.$data[$i]['armada'].'</td>
                                <td>'.$data[$i]['tgl_sewa'].'</td>
                                <td>'.$data[$i]['durasi'].'</td>
                                <td>'.$data[$i]['sopir'].'</td>
                                <td>'.$data[$i]['status'].'</td>
                                
                        ';
                    }?>
                    </table>
        </main>
    </div>
</body>
</html>