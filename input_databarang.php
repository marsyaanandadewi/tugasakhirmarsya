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
<a href="kelola_databarang.php">
    <div class="input_btn">
        kembali
    </div></a>
    <center>
  <div class="input"> 
<h2>Masukan Data</h2>
            <br>
    <form action="" method="post">
        <label for="">Nama</label>
        <br>
        <input type="text" name="nama" id="" require>
        <br>
        <label for="">Isi</label>
        <br>
        <input type="text" name="isi" id=""  require>
        <br>
        <label for="">Berat</label>
        <br>
        <input type="text" name="berat" id=""  require>
        <br>
        <br>
        <button type="submit" name="submit" class="input_btn">Kirim</button>
    </form>    
    </div> 
    </center>
</body>
</html>