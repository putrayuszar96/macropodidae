<?php

function create_kepemilikan($data){

}

function read_kepemilikan($filter){
    include '../models/koneksi.php';

    if(!empty($filter)){
        $query = "SELECT kepemilikan.id, kepemilikan.id_cabang, kepemilikan.rak_mulai, kepemilikan.rak_akhir, kepemilikan.rak_tambahan, divisi.id_divisi, divisi.nama ";
        $query .= "FROM kepemilikan";
        $query .= " INNER JOIN divisi ON kepemilikan.id_divisi = divisi.id_divisi";
        $query .= " WHERE kepemilikan.id_cabang = '".$filter['cabang']."'";

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

function update_kepemilikan($id, $data){

}

function delete_kepemilikan($id){

}

function show_kepemilikan($filter)
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