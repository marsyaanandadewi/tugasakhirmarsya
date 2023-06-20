<?php
require 'controller.php';
$id = $_GET['id'];
$table = "data_airminum";
$query_get = "SELECT * FROM $table WHERE id = '$id'";
$data_exe = query($query_get);
$data = mysqli_fetch_assoc($data_exe);

if (isset($_POST['submit'])){
    $field = ['nama','isi','berat'];

    $nama= $_POST['nama'];
    $isi= $_POST['isi'];
    $berat= $_POST['berat'];
    $data = [$nama,$isi,$berat];
    update($table,$field,$data, 'id', $id);

    if($status = "berhasil"){
        echo "<script>
            alert ('data berhasil diupdate');
            document.location.href= 'kelola_databarang.php';
            </script>" ;
    }else{
        echo "<script>
            alert ('data gagal diupdate');
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
    <link rel="stylesheet" href="style.css">
    <title>TUGASAKHIR</title>
</head>
<body>
<a href="beranda.php">
    <div class="input_btn">
        Beranda
    </div>
    <center>
  <div class="input">
<h3>Masukan Data yang Ingin Di Update</h3>
           
    <form action="" method="post">
        <label>ID = <?= $id ?></label>
        <br>
        <label for="">Nama</label>
        <br>
        <input type="text" name="nama" id="" value="<?= $data['nama'] ?>" require>
        <br>
        <label for="">Isi</label>
        <br>
        <input type="text" name="isi" id="" value="<?= $data['isi'] ?>"  require>
        <br>
        <label for="">Berat</label>
        <br>
        <input type="text" name="berat" id="" value="<?= $data['berat'] ?>"  require>
        <br>
        <button type="submit" name="submit" class="input_btn">Kirim</button>
    </form>    
    </div>  
    </center>
</body>
</html>