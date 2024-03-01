<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar Penyewaan</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <h1>Penyewaan Armada Transportasi</h1>
        <div class="tbl-armada">
            <p>Tabel Armada</p>
            <table  border="2" align="center">
                <tr>
                    <th>ID</th>
                    <th>No. Armada</th>
                    <th>No. Polisi</th>
                    <th>Jenis Kendaraan</th>
                    <th>Merk</th>
                </tr>
                <tr>
                    <?php
                    include "koneksi.php";
                    $query = mysqli_query($conn, "select * from armada");
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['no_armada']; ?></td>
                    <td><?php echo $data['no_polisi']; ?></td>
                    <td><?php echo $data['jenis']; ?></td>
                    <td><?php echo $data['merk']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="header">
            <div class="urutkan">
                <form action="" method="post">
                    <button type="submit" name="sort">Urutkan</button>
                </form>
                <button class="btn-form"><a href="form.php">Sewa</a></button>
            </div>
            <div class="cari">
                <form action="" method="post">
                    <input type="date" name="key-search">
                    <button type="submit" name="search">Cari</button>
                </form>
            </div>
        </div>
        <p>Tabel Penyewaan</p>
        <table border="2" align="center">
            <tr>
                <th>ID</th>
                <th>Nama Penyewa</th>
                <th>No. Hp</th>
                <th>Alamat</th>
                <th>NIK</th>
                <th>No. Armada</th>
                <th>Tanggal Sewa</th>
                <th>Durasi</th>
                <th>Dengan Supir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <?php 
                include "koneksi.php";

                $query = mysqli_query($conn, "select * from penyewaan");
                $datas = mysqli_fetch_all($query, MYSQLI_ASSOC);

                if(isset($_POST['search'])){
                    $key = $_POST['key-search'];
                    $result = [];
                    for($i=0; $i<count($datas); $i++){
                        if(strtolower($datas[$i]['tgl_sewa']) == strtolower($key)){
                            array_push($result, $datas[$i]);
                        }
                    }
                    refresh($result);
                } else if(isset($_POST['sort'])){
                    $length = count($datas);

                    for($i=0; $i<$length; $i++){
                        $swap = false;
                        for($j=0; $j<$length-$i-1; $j++){
                            if($datas[$j]['tgl_sewa'] > $datas[$j+1]['tgl_sewa']){
                                $temp = $datas[$j];
                                $datas[$j] = $datas[$j+1];
                                $datas[$j+1] = $temp;
                                $swap = true;
                            }
                        }
                        if($swap == false){
                            break;
                        }
                    }
                    refresh($datas);
                } else {
                    refresh($datas);
                }

                function refresh($datas){
                    for($i=0; $i<count($datas); $i++){
                        $id = $datas[$i]['id'];
                        $setuju = $datas[$i]['status'];
                ?>
                <td><?php echo $datas[$i]['id']; ?></td>
                <td><?php echo $datas[$i]['nama_penyewa']; ?></td>
                <td><?php echo $datas[$i]['nohp']; ?></td>
                <td><?php echo $datas[$i]['alamat']; ?></td>
                <td><?php echo $datas[$i]['nik']; ?></td>
                <td><?php echo $datas[$i]['no_armada']; ?></td>
                <td><?php echo $datas[$i]['tgl_sewa']; ?></td>
                <td><?php echo $datas[$i]['durasi']; ?></td>
                <td><?php echo $datas[$i]['with_supir']; ?></td>
                <td><?php echo $datas[$i]['status'];?></td>
                <td>
                    <a class="ubah" href="ubah.php?id=<?php echo $id;?>&&status=<?php echo $setuju;?>">Ubah</a> | 
                    <a class="hapus" href="hapus.php?id=<?php echo $id;?>">Hapus</a>
                </td>
            </tr>
            <?php } }?>
        </table>
    </div>
</body>
</html>