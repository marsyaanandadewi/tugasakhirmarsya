<?php
session_start();
if( isset($_SESSION['login']) ){
    header("location: beranda.php");
    exit;   
  }

    require 'controller.php';

    if( isset($_POST["login"]) ){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and password = '$password'");
        
        if( mysqli_num_rows($cek)  == 1 ){
                echo "<script>
            alert ('login berhasil');
            document.location.href= 'beranda.php';
            </script>" ;
        
            }else{
                echo "<script>
                alert ('ussername/password salah');
                document.location.href= 'index.php';
                </script>" ;
            }

        $error = true;
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
<center>
<body>
   <div class="input">
   <h2>SILAHKAN LOGIN</h2> 
<tr>
    <form action="" method="post">
        <td>
            <label for="">username</label>
            <input type="text" name="username" id=""  autocomplete="off">
</td>
<br>
<br>
        <td>
            <label for="">Password</label>
            <input type="password" name="password" id=""  autocomplete="off">
</td>
        <br>
        <button type="submit" name="login" class="input_btn">login</button>
        <br>
</form>
</tr>
</div>
</center>
</body>
</html>