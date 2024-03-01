<?php
$db = mysqli_connect('localhost', 'root', '', 'db_seda');
if (!$db) {
    echo 'Koneksi Error';
}

$query = "select * from penyewaan";
$sql = mysqli_query($db, $query);
$penyewaan = mysqli_fetch_all($sql, MYSQLI_ASSOC);

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if (isset($_GET['noconfirm'])) {
        header("location:index.php?confirm=$id");
    } else {
        $query = mysqli_query($db, "delete from penyewaan where id=$id");
        if ($query) {
            header('Location:index.php');
        }
    }
}

if (isset($_GET['setujui'])) {
    $id = $_GET['setujui'];
    $status = 'Disetujui';

    $query = mysqli_query($db, "update penyewaan set status='$status' where id=$id");
    if ($query) {
        header('Location:index.php');
    }
}

if (isset($_POST['sort'])) {
    function sorting_tgl(&$arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $swap = false;
            for ($j = 0; $j < count($arr) - $i - 1; $j++) {
                if (strtotime($arr[$j]['tanggal_sewa']) > strtotime($arr[$j + 1]['tanggal_sewa'])) {
                    $sementara = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $sementara;
                    $swap = true;
                }
            }
            if ($swap == false) {
                break;
            }
        }
    }
    function sorting_nama(&$arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $swap = false;
            for ($j = 0; $j < count($arr) - $i - 1; $j++) {
                if ($arr[$j]['nama_penyewa'] > $arr[$j + 1]['nama_penyewa']) {
                    $sementara = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $sementara;
                    $swap = true;
                }
            }
            if ($swap == false) {
                break;
            }
        }
    }

    $key = $_POST['sort'];
    
    if ($key == 'nama_penyewa') {
        sorting_nama($penyewaan);
    } else if($key == 'tanggal_sewa') {
        sorting_tgl($penyewaan);
    }
}

if (isset($_POST['search'])) {
    $key = $_POST['key'];
    function search($arr, $key)
    {
        $new = [];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i]['tanggal_sewa'] == $key) {
                array_push($new, $arr[$i]);
            }
        }
        return $new;
    }
    $result = search($penyewaan, $key);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR PENYEWAAN</title>
    <link rel="stylesheet" href="stylee.css">
</head>

<body>
    <?php
    if (isset($_GET['confirm'])) {
        $id = $_GET['confirm']; ?>
        <div class="confirm">
            <h3>Anda Yakin ingin menghapus</h3>
            <a href="index.php"><button class="btn-cancel" type="button">Cancel</button></a>
            <a href="index.php?hapus=<?= $id ?>"><button class="btn-confirm" type="button">Confirm</button></a>
        </div>
    <?php
    } else { ?>
        <div class="wrapper">
            <h1>Daftar Penyewaan</h1>
            <div class="atas">
                <form class="sort" action="index.php" method="post">
                    <button type="submit" name="sort" value="tanggal_sewa">Urutkan Berdasarkan Tanggal Penyewaan</button>
                </form>
                <form class="sort" action="index.php" method="post">
                    <button type="submit" name="sort" value="nama_penyewa">Urutkan Berdasarkan Nama</button>
                </form>
                <form class="search" action="index.php" method="post">
                    <input type="date" value="<?= date('Y-m-d') ?>" name="key">
                    <button type="submit" name="search">Cari Tanggal</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nama Penyewa</td>
                        <td>NIK</td>
                        <td>No Telpon</td>
                        <td>Alamat</td>
                        <td>Armada</td>
                        <td>Tanggal Sewa</td>
                        <td>Durasi Penyewaan</td>
                        <td>Memakai Sopir</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!isset($_POST['search'])) {
                        for ($i = 0; $i < count($penyewaan); $i++) { ?>
                            <tr>
                                <td><?= $penyewaan[$i]['id'] ?></td>
                                <td><?= $penyewaan[$i]['nama_penyewa'] ?></td>
                                <td><?= $penyewaan[$i]['nik'] ?></td>
                                <td><?= $penyewaan[$i]['no_telp'] ?></td>
                                <td><?= $penyewaan[$i]['alamat'] ?></td>
                                <td><?= $penyewaan[$i]['armada'] ?></td>
                                <td><?= $penyewaan[$i]['tanggal_sewa'] ?></td>
                                <td><?= $penyewaan[$i]['durasi'] . " Hari" ?></td>
                                <td><?= $penyewaan[$i]['sopir'] ?></td>
                                <td><?= $penyewaan[$i]['status'] == null ? "Belum Disetujui" : $penyewaan[$i]['status']  ?></td>
                                <td>
                                    <a href="index.php?setujui=<?= $penyewaan[$i]['id'] ?>"><button class="setuju" type="button">Setujui</button></a>
                                    <a href="index.php?noconfirm&hapus=<?= $penyewaan[$i]['id'] ?>"><button class="hapus" type="button">Hapus</button></a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        for ($i = 0; $i < count($result); $i++) { ?>
                            <tr>
                                <td><?= $result[$i]['id'] ?></td>
                                <td><?= $result[$i]['nama_penyewa'] ?></td>
                                <td><?= $result[$i]['nik'] ?></td>
                                <td><?= $result[$i]['no_telp'] ?></td>
                                <td><?= $result[$i]['alamat'] ?></td>
                                <td><?= $result[$i]['armada'] ?></td>
                                <td><?= $result[$i]['tanggal_sewa'] ?></td>
                                <td><?= $result[$i]['durasi'] . " Hari" ?></td>
                                <td><?= $result[$i]['sopir'] ?></td>
                                <td><?= $result[$i]['status'] == null ? "Belum Disetujui" : $result[$i]['status']  ?></td>
                                <td>
                                    <a href="index.php?setujui=<?= $result[$i]['id'] ?>&noconfirm"><button class="setuju" type="button">Setujui</button></a>
                                    <a href="index.php?noconfirm&hapus=<?= $result[$i]['id'] ?>"><button class="hapus" type="button">Hapus</button></a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>