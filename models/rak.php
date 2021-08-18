<?php

function create_rak($data){

}

function read_rak($filter){
    include '../models/koneksi.php';

    if(!empty($filter)){
        $query = "SELECT rak.id_rak, kantor_cabang.nama, rak.jumlah_level, rak.jumlah_sublevel, rak.tambahan ";
        $query .= "FROM rak INNER JOIN kantor_cabang ON rak.id_cabang = kantor_cabang.id_cabang";
        $query .= "WHERE rak.id_cabang = " . $filter['id_cabang'];

        $query_run = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_array($query_run);

        return $result;
    }else{
        $query = "SELECT rak.id_rak, kantor_cabang.nama, rak.jumlah_level, rak.jumlah_sublevel, rak.tambahan FROM rak INNER JOIN kantor_cabang ON rak.id_cabang = kantor_cabang.id_cabang";
        $query_run = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

        return $result;
    }
}

function update_rak($id, $data){

}

function delete_rak($id){

}

function show_rak($id){
    include '../models/koneksi.php';

    $query = "SELECT rak.id_rak, kantor_cabang.nama, rak.jumlah_level, rak.jumlah_sublevel, rak.tambahan";
    $query .= " FROM rak INNER JOIN kantor_cabang ON rak.id_cabang = kantor_cabang.id_cabang";
    $query .= " WHERE rak.id_cabang = '" . $id."'";

    $query_run = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($query_run);

    return $result;
}