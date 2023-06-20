<?php
require 'controller.php';

$get_data = get_all_data('data_airminum');

if(isset($_GET['hapus'])){
    delete('transaksi','id_data_minum',$_GET['id']);
    delete('data_airminum','id',$_GET['id']);

    if($status = "berhasil"){
        echo "<script>
            alert ('data berhasil dihapus');
            document.location.href= 'kelola_databarang.php';
            </script>" ;
    }else{
        echo "<script>
            alert ('data gagal dihapus');
            document.location.href= 'kelola_databarang.php';
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
<body>
<a href="beranda.php">
    <div class="input_btn">
        Beranda
    </div>
   <center>
    <br>
<h1 style="color:#576F72;">DATA BARANG</h1>
<br>
<a href= "input_databarang.php"  class="input_btn">Tambah data barang</a>
<div class="barang">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col">
            <table class="table" >
        <thead>
         <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>isi</th>
            <th>Berat</th>
            <th></th>
            <th></th>
        <?php
            $query_get_all = "SELECT * FROM data_airminum";
            $data_exe = query($query_get_all);
            $no = 0;
            while($data = mysqli_fetch_assoc($data_exe)){
                $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['isi'] ?></td>
                    <td><?= $data['berat'] ?></td>
                    <td><a class="input_btn" href="kelola_databarang.php?hapus&id=<?= $data["id"] ?>" onclick ="return confirm ('bener nih mau di hapus?');">Delete</a></td>
                    <td><a class="input_btn" href="update_databarang.php?id=<?= $data['id'] ?>">Update</a></td>
                </tr>
                <?php
            }
        ?>
        <thead>
        <tbody>
        </div>
        </center> 
        
</body>
</html>