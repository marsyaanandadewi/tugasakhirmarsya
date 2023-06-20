<?php
require 'controller.php';

if (isset($_POST['submit'])){
    $table = "data_airminum";

    $field = ['nama','isi','berat'];

    $nama= $_POST['nama'];
    $isi= $_POST['isi'];
    $berat= $_POST['berat'];
    $data = [$nama,$isi,$berat];
    input($table,$field,$data);

    if($status = "berhasil"){
        echo "<script>
            alert ('data berhasil di tambahkan');
            document.location.href= 'input_databarang.php';
            </script>" ;
    }else{
        echo "<script>
            alert ('data gagal di tambahkan');
            document.location.href= 'input_databarang.php';
            </script>" ;
    }
}

if(isset($_POST['tambah'])){
    $table = "transaksi";

    $field = ['id_data_minum','id_admin','tanggal','keterangan','jumlah'];

    $id = $_POST['id'];
    $id_admin = "1";
    $tanggal = date("Y-m-d");
    $keterangan = "1";
    $jumlah = $_POST["jumlah_tambah"];
    $data_tambah = [$id,$id_admin,$tanggal,$keterangan,$jumlah];

    input($table,$field,$data_tambah);

    if($status = "berhasil"){
        echo "<script>
            alert ('stok berhasil di tambahkan');
            document.location.href= 'input_stok.php';
            </script>" ;
    }else{
        echo "<script>
            alert ('stok gagal di tambahkan');
            document.location.href= 'input_stok.php';
            </script>" ;
    }
}

if(isset($_POST['kurang'])){
    $table = "transaksi";

    $field = ['id_data_minum','id_admin','tanggal','keterangan','jumlah'];

    $id = $_POST['id'];
    $id_admin = "1";
    $tanggal = date("Y-m-d");
    $keterangan = "0";
    $jumlah = $_POST["jumlah_kurang"];
    $data_tambah = [$id,$id_admin,$tanggal,$keterangan,$jumlah];

    input($table,$field,$data_tambah);

    if($status = "berhasil"){
        echo "<script>
            alert ('stok berhasil diupdate');
            document.location.href= 'input_stok.php';
            </script>" ;
    }else{
        echo "<script>
            alert ('stok gagal diupdate');
            document.location.href= 'input_stok.php';
            </script>" ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>TUGASAKHIR</title>
</head>
<body style="backround-color:#F0EBE3;">
<a href="beranda.php">
    <div class="input_btn">
        Beranda
    </div>
</a>
<br>
<?php
    $query_get_all = "SELECT * FROM data_airminum";
    $data_exe = query($query_get_all);
    $no = 0;
    while($data = mysqli_fetch_assoc($data_exe)){
    $stok_barang = search_stok('id_data_minum',$data['id']);
?>
<div style="width=100%">
<div class="translate-middle" style="margin-left:50%;">
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <table class="card position-relative" style=" float:left; margin:15px; background-color:#7D9D9C; padding:25px; color:white;" >
        <thead>
        <tr>
            <td colspan="2">ID : <?= $data['id'] ?></td>    
        </tr>
        <tr>
            <td colspan="2">Nama Barang : <?= $data['nama'] ?></td>
        </tr>
        <tr>
            <td colspan="2">Banyak Isi : <?= $data['isi'] ?></td>
        </tr>
        <tr>
            <td colspan="2">Berat : <?= $data['berat'] ?></td>
        </tr>
        <tr>
            <td colspan="2">Stok : <?=$stok_barang?></td>
        </tr>
        
            <tr>
                <td><input type="text" name="jumlah_tambah" id="" class="input_txt"></td>
                <td><input type="submit" value="Tambah" name="tambah" class="input_btn"></td>
            </tr>
            <tr>
                <td><input type="text" name="jumlah_kurang" id="" class="input_txt"></td>
                <td><input type="submit" value="Kurang" name="kurang" class="input_btn"></td>
            </tr>
        </thead>
    </table>
    </form>
    </div>
    </div>
<?php
    }
?> 
</body>
</html>