<?php

function create_peminjaman($data){
    include '../models/koneksi.php';

    $data['tanggal_pinjam'] = strtotime($data['tanggal_pinjam']);

    $query = "INSERT INTO peminjaman(uuid_barang, peminjam, tanggal_pinjam, tanggal_kembali) VALUES(";
    $query .= "'".$data['uuid_barang']."'";
    $query .= ", '".$data['peminjam']."'";
    $query .= ", '".$data['tanggal_pinjam']."'";
    $query .= ", NULL)";

    $query2 = "UPDATE barang SET status_pinjam = 0 WHERE uuid_barang = '".$data['uuid_barang']."'";

    $query_run = mysqli_query($koneksi, $query);
    $query2_run = mysqli_query($koneksi, $query2);
    
    if(mysqli_affected_rows($koneksi)){
        return true;
    }else{
        return mysqli_error($koneksi);
    }
}

function ambil_peminjaman($data){
    include '../models/koneksi.php';
    
    $query = "SELECT userlogin.fullname, peminjaman.tanggal_pinjam FROM peminjaman INNER JOIN userlogin ON peminjaman.peminjam = userlogin.iduser WHERE uuid_barang = '".$data['uuid_barang']."' AND tanggal_kembali IS NULL";

    $query_run = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($query_run);

    return $result;
}