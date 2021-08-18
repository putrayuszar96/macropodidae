<?php

function create_barang($data){
    include '../models/koneksi.php';

    $query = "INSERT INTO barang(uuid_barang, nama_barang, id_cabang, id_divisi, uploader, status_pinjam, rak_posisi) VALUES(";
    $query .= "'".gen_uuid()."'";
    $query .= ", '".$data['nama_barang']."'";
    $query .= ", '".$data['kantor_cabang']."'";
    $query .= ", '".$data['divisi']."'";
    $query .= ", '".$data['uploader']."'";
    $query .= ", '".$data['status_pinjam']."'";
    $query .= ", '".$data['rak']."');";

    $query_run = mysqli_query($koneksi, $query);
    
    if(mysqli_affected_rows($koneksi)){
        return true;
    }else{
        return mysqli_error($koneksi);
    }
}

function read_barang($filter){
    include '../models/koneksi.php';

    if(!empty($filter)){
        $query = "SELECT barang.uuid_barang, barang.nama_barang, barang.status_pinjam, barang.rak_posisi, barang.id_cabang, barang.id_divisi, divisi.nama AS nama_divisi, barang.uploader, userlogin.fullname AS nama_uploader, kantor_cabang.nama AS nama_cabang ";
        $query .= "FROM barang";
        $query .= " INNER JOIN divisi ON barang.id_divisi = divisi.id_divisi";
        $query .= " INNER JOIN userlogin ON barang.uploader = userlogin.iduser";
        $query .= " INNER JOIN kantor_cabang ON barang.id_cabang = kantor_cabang.id_cabang";
        $query .= " WHERE barang.id_cabang = '".$filter['cabang']."'";

        $query_run = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

        return $result;
    }else{
        $query = "SELECT kepemilikan.id, kepemilikan.rak_mulai, kepemilikan.rak_akhir, kepemilikan.rak_tambahan, divisi.nama FROM kepemilikan INNER JOIN divisi ON kepemilikan.id_divisi = kepemilikan.id_divisi";
        $query_run = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_assoc($query_run, MYSQLI_ASSOC);

        return $result;
    }
}

function update_barang($id, $data){

}

function delete_barang($id){

}

function show_barang($filter)
{
    include '../models/koneksi.php';

    $query = "SELECT kepemilikan.id, kepemilikan.id_cabang, kepemilikan.rak_mulai, kepemilikan.rak_akhir, kepemilikan.rak_tambahan, divisi.id_divisi, divisi.nama ";
    $query .= "FROM kepemilikan";
    $query .= " INNER JOIN divisi ON kepemilikan.id_divisi = divisi.id_divisi";
    $query .= " WHERE kepemilikan.id_cabang = '".$filter['cabang']."'";

    $query_run = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($query_run);

    return $result;
}

function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}