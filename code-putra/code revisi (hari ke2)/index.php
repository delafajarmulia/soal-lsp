<?php
    include('koneksi.php'); // koneksi ke database
    $no = 1; //variabel nomer tabel 
    $query = "SELECT p.id, p.nama_penyewa, p.no, p.alamat, p.nik, a.armada, p.tgl_sewa, p.durasi, p.sopir, p.status 
                FROM penyewaan AS p
                LEFT JOIN armada AS a 
                ON p.armada_id=a.id"; // query sql agar bisa mengambil data dari database
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC); // memanggil query sql ke variabel


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
            <!-- source code button cari -->
            <form class="search" method="post" action="index.php">
                <?php if (isset($_POST['cari'])) { //mengembalikan keyword pencarian ?>
                    <input name="keyword" placeholder="   Search" value="<?php echo "  ".$_POST['keyword']?>" type="text">
                <?php } 
                else{ ?>
                    <input name="keyword" placeholder="   Cari tanggal Penyewa" type="date">
                <?php } ?>
                <button type="submit" name="cari" value="cari" class="btn">Cari</button>
            </form>
        </header>
        
        <div class="add">
            <div class="sortir">
                <p>Urutkan Berdasarkan</p>
                <!-- Logika Sorting -->
                <?php 
                    // Jika tombol urutkan dipencet
                    if (isset($_POST['sort'])) {
                        $key = $_POST['key'];
                
                        //Function Sort(bubble sort)
                        function sorting(&$arr, $key){
                            $length = count($arr);
                
                            for ($i=0; $i < $length; $i++) { 
                                $swap = false;
                                for ($j=0; $j < $length - $i - 1; $j++) { 
                                    if ($arr[$j][$key] > $arr[$j+1][$key]) {
                                        $sementara = $arr[$j];
                                        $arr[$j] = $arr[$j+1];
                                        $arr[$j+1] = $sementara;
                                        $swap = true;
                                    }
                                }
                                if ($swap == false) {
                                    break;
                                }
                            }
                        }

                        //Menjalankan function sorting
                        sorting($data, $key);

                        //Mengembalikan keyword sorting?>
                        
                        <!-- source code pencarian(sorting) -->
                        <form action="index.php" method="post" class="">
                            <select class="sort-item" name="key" id="">
                                <option value="tgl_sewa" <?php echo $key == 'tgl_sewa' ? 'selected' : '' ?>>Tanggal Sewa</option>
                                <option value="nama_penyewa" <?php echo $key == 'nama_penyewa' ? 'selected' : '' ?>>Nama Penyewa</option>
                                
                            </select>
                            <button class="btn btn-sort" name="sort" value="sort" type="submit">Urutkan</button>
                        </form>
                    <?php }
                    else { ?>
                        <form action="index.php" method="post">
                            <select class="sort-item" name="key" id="">
                                <option value="tgl_sewa">Tanggal Sewa</option>
                                <option value="nama_penyewa">NAma Penyewa</option>
                            </select>
                            <button class="btn btn-sort" name="sort" value="sort" type="submit">Urutkan</button>
                        </form>
                    <?php }
                ?>
            </div>
        </div>

        <main>
            <h2>Daftar Penyewaan Armada</h2><br>

             <!-- Logika searching dan juga untuk menampilkan data ke tabel -->
            <?php
                //Jika tombol cari dipencet
                if (isset($_POST['cari'])) {
                    $key = $_POST['keyword'];
                    $arr = $data;
                    $new = [];
                    
                    //Function Search(Sequential Search)
                    for ($i=0; $i < count($arr); $i++) {
                        if (strtolower($arr[$i]['tgl_sewa']) == strtolower($key)) {
                            array_push($new, $arr[$i]);
                        }
                    }

                    //Menampilkan hasil search
                    if (count($new) != 0) { ?>
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
                                <th>Action</th>
                            </tr>
                    <?php
                        for ($i=0; $i < count($new); $i++) {
                            $no=$i+1;?>
                            
                                <tr>
                                    <td><?php echo $no?></td>
                                    <td><?php echo$new[$i]['nama_penyewa']?></td>
                                    <td><?php echo$new[$i]['no']?></td>
                                    <td><?php echo$new[$i]['alamat']?></td>
                                    <td><?php echo$new[$i]['nik']?></td>
                                    <td><?php echo$new[$i]['armada']?></td>
                                    <td><?php echo$new[$i]['tgl_sewa']?></td>
                                    <td><?php echo$new[$i]['durasi']?></td>
                                    <td><?php echo$new[$i]['sopir']?></td>
                                    <td><?php echo$new[$i]['status']?></td>
                                    <td><a href="edit.php?id=<?php echo$new[$i]['id']?>"><button style = "background-color: #00BFFF;"  class="btn btn-edit" type="button">Edit Status</button></a>
                                        <a href="hapus.php?id=<?php echo$new[$i]['id']?>"><button  onclick = "return confirm('Apakah data ingin dihapus?')"  style = " border: 0;
                                                                                                        padding: 10px;
                                                                                                        border-radius: 5px;
                                                                                                        background-color: #b80808;
                                                                                                        color: #FFFFFF;"
                                                                                                         class="btn btn-hapus" type="button">Hapus Data</button></a></td>
                                </tr>
                            
                       <?php }?>
                        </table>
                <?php }
                    //Jika hasil search tidak ditemukan
                    else{
                        echo '<h3>Data Penyewaan tidak ditemukan</h3>';
                    }
                }

                //Tampilan data pe sebelum pencarian
                else{ ?>
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
                                <th>Action</th>
                        </tr>
                <?php
                    for ($i=0; $i < count($data); $i++) { 
                        $no=$i+1;
                        ?>
                            <tr>
                                <td><?php echo$no?></td>
                                <td><?php echo$data[$i]['nama_penyewa']?></td>
                                <td><?php echo$data[$i]['no']?></td>
                                <td><?php echo$data[$i]['alamat']?></td>
                                <td><?php echo$data[$i]['nik']?></td>
                                <td><?php echo$data[$i]['armada']?></td>
                                <td><?php echo$data[$i]['tgl_sewa']?></td>
                                <td><?php echo$data[$i]['durasi']?></td>
                                <td><?php echo$data[$i]['sopir']?></td>
                                <td><?php echo$data[$i]['status']?></td>
                                <td><a href="edit.php?id=<?php echo$data[$i]['id']?>"><button style =" background-color:#00BFFF;" class="btn btn-edit" type="button">Edit Status</button></a>
                                <a  href="hapus.php?id=<?php echo$data[$i]['id']?>"><button onclick = "return confirm('Apakah data ingin dihapus?')" style = " border: 0;
                                                                                            padding: 10px;
                                                                                            border-radius: 5px;
                                                                                            background-color: #b80808;
                                                                                            color: #FFFFFF;"
                                                                                            class="btn btn-hapus" type="button">Hapus Data</button></a></td>
                            </tr>
                     <?php  
                    }?>
                    </table>
            <?php } ?>
        </main>
    </div>
</body>
</html>