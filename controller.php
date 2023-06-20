<?php
$conn = mysqli_connect("localhost","root","","gudang");

function query($query){
    global $conn;
   $result = mysqli_query($conn, $query);

   return $result;
}

function get_all_data($table){
    $query_get_all = "SELECT * FROM $table";
    $data_exe = query($query_get_all);
    return $data_exe;
}

function search_data($table, $field, $keyword){
    $i=0; 
    while($i < count($field)){
        $src[$i] = $field[$i] . " LIKE '%" . $keyword . "%'";
        $i++; 
    }
    $query_search = "SELECT * FROM $table where" . implode(" OR ", $src);
    $result_data = query($query_search);
    return $result_data;
}

function search_single_data($table, $field, $keyword){
    $query_search = "SELECT * FROM $table where $field = '$keyword'";
    $result_data = query($query_search);
    return $result_data;
}

function search_stok($field, $keyword){
    $query_search = "SELECT SUM(jumlah) as jumlah_sum FROM transaksi where $field = '$keyword' and keterangan = '1'";
    $result_data = query($query_search);
    $tambah_exe = mysqli_fetch_assoc($result_data);
    $tambah = $tambah_exe['jumlah_sum'];
    $query_search_kurang = "SELECT SUM(jumlah) as jumlah_sum_kurang FROM transaksi where $field = '$keyword' and keterangan = '0'";
    $result_data_kurang = query($query_search_kurang);
    $kurang_exe = mysqli_fetch_assoc($result_data_kurang);
    $kurang = $kurang_exe['jumlah_sum_kurang'];
    $stok = $tambah - $kurang;
    return $stok;
}

function input($table,$field, $value){
    $query_input = "INSERT INTO $table (" . implode(",", $field) . ") VALUES ('"
     . implode("','", $value) . "')";
    $exe = query($query_input);
    if(!$exe){
        $status = "gagal";
    }else{
        $status = "berhasil";
    }

    return $status;
}

function delete($table, $field, $value){
    echo "test";
    $query_delete = "DELETE FROM $table WHERE $field = $value";
    $exe = query($query_delete);
    if(!$exe){
        $status = "gagal";
    }else{
        $status = "berhasil";
    }

    return $status;
}

function update($table, $field, $value, $primary, $id){
    $i=0; 
    while($i < count($field)){
        $upd[$i] = $field[$i] . " = '" . $value[$i] . "'"; 
        $i++;
    }
    $query_update = "UPDATE $table SET " . implode(", ", $upd) . " WHERE $primary = '$id'";
    $exe = query($query_update);
    if(!$exe){
        $status = "gagal";
    }else{
        $status = "berhasil";
    }
    return $status;
}
?>