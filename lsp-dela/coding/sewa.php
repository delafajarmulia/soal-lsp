<?php
    include 'connector.php';

    if(isset($_POST['pinjam'])){
        $namaPeminjam = $_POST['namaPeminjam'];
        $nik = $_POST['nik'];
        $noHP = $_POST['noHP'];
        $alamat = $_POST['alamat'];
        $tglPinjam = $_POST['tglPinjam'];
        $durasi = $_POST['durasi'];
        $noArmada = $_POST['noArmada'];
        $withSupir = $_POST['withSupir'];

        if($noHP < 10000000000000 || $nik < 10000000000000000){
            $query = "INSERT INTO penyewaans(armada_id, nik, nama, no_hp, alamat, tgl_pinjam, durasi, with_supir, status)
                        VALUES($noArmada, '$nik', '$namaPeminjam','$noHP','$alamat','$tglPinjam', $durasi, '$withSupir','belum_disetujui')";
            $execute = mysqli_query($conn, $query);
    
            if($execute){
                echo '<script>
                    alert("berhasil melakukan penyewaan, silahkan menunggu persetujuan dari admin")
                </script>';
            }else{
                echo '<script>
                    alert("gagal melakukan penyewaan")
                </script>';
            }
        }else{
            echo '<script>
                alert("pastikan data nomor HP tidak melebihi dari 13 digit dan data dari NIK tidak melebihi dari 16 digit")
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
    <link rel="stylesheet" href="css/sewa.css">
</head>
<body>
    <div class="con">
        <nav>
            <h1 class="title-nav">Penyewaan Armada</h1>
            <a href="cek-admin.php"><div class="btn-admin">Admin</div></a>
        </nav>
        <div class="card">
            <h1 class="title-card">Penyewaan Armada</h1>
            <form action="" method="post">
                <table class="input-table">
                    <tr>
                        <td><label for="">Nama Peminjam</label></td>
                        <td><input type="text" name="namaPeminjam" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">NIK</label></td>
                        <td><input type="number" class="num" name="nik" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Nomor HP</label></td>
                        <td><input type="number" class="num" name="noHP" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Alamat</label></td>
                        <td><textarea name="alamat" id="" cols="33" rows="5" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="">Tanggal Pinjam</label></td>
                        <td><input type="date" class="date" name="tglPinjam" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Durasi (Hari)</label></td>
                        <td><input type="number" class="num" name="durasi" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Nama Armada</label></td>
                        <td>
                            <select name="noArmada" id="" required>
                                <?php
                                    $getArmadas = mysqli_query($conn, "SELECT * FROM armadas");
                                    while($armada = mysqli_fetch_assoc($getArmadas)){ ?>
                                        <option value="<?php echo $armada['id'];?>"><?php echo $armada['nama'];?></option>
                                <?php }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Dengan Supir</label></td>
                        <td>
                            <select name="withSupir" id="" required>
                                <option value="iya">Iya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name="pinjam">Pinjam</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>