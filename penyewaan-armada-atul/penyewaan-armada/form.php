<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penyewaan</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <h2>Form Penyewaan Armada</h2>
        <form action="" method="post">
            <div>
                <label>Nama Penyewa</label>
                <input type="text" class="input" name="nama-penyewa" required>
            </div>
            <div>
                <label>No HP</label>
                <input type="text" class="input" name="nohp" required>
            </div>
            <div>
                <label>Alamat</label>
                <input type="text" class="input" name="alamat" required>
            </div>
            <div>
                <label>NIK</label>
                <input type="text" class="input" name="nik" required>
            </div>
            <div>
                <label>No Armada</label>
                <select class="input" name="no-armada">
                    <?php
                    include "koneksi.php";
                    $query=mysqli_query($conn, "SELECT * FROM armada");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?=$data['no_armada'];?>"><?php echo $data['no_armada'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>Tanggal Sewa</label>
                <input type="date" class="input" name="tgl-sewa" required>
            </div>
            <div>
                <label>Durasi</label>
                <input type="number" class="input" name="durasi" placeholder="*Hari" required>
            </div>
            <div>
                <label>Dengan Supir</label>
                <select class="input" name="with-supir">
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                </select>
            </div>
            <input type="hidden" name="status" value="belum_disetujui">
            <div>
                <button name="batal"><a href="index.php">Batal</a></button>
                <button type="submit" name="simpan">Simpan</button>
            </div>
        </form>
        <?php
        if(isset($_POST['simpan'])) {
            $namaPenyewa = $_POST['nama-penyewa'];
            $noHP = $_POST['nohp'];
            $alamat = $_POST['alamat'];
            $nik = $_POST['nik'];
            $noArmada = $_POST['no-armada'];
            $tglSewa = $_POST['tgl-sewa'];
            $durasi = $_POST['durasi'];
            $withSupir = $_POST['with-supir'];
            $status = $_POST['status'];

            include "koneksi.php";

            $query = mysqli_query($conn, "INSERT INTO penyewaan(nama_penyewa,nohp,alamat,nik,no_armada,tgl_sewa,durasi,with_supir,status) VALUES('$namaPenyewa','$noHP','$alamat','$nik','$noArmada','$tglSewa','$durasi','$withSupir','$status')");

            if(!$query){
                die("error");
            }else{
                header('location: index.php');
            }
        }
        ?>
    </div>
</body>
</html>