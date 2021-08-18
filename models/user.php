<?php

function create($data){

}

function read($filter){
    include '../models/koneksi.php';

    if(!empty($filter)){

    }else{
        $query = "SELECT userlogin.iduser, userlogin.fullname, kantor_cabang.nama as nama_cabang, divisi.nama as nama_divisi FROM userlogin INNER JOIN kantor_cabang ON userlogin.id_cabang = kantor_cabang.id_cabang INNER JOIN divisi ON userlogin.id_divisi = divisi.id_divisi";

        $query_run = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

        return $result;
    }
}

function update($id, $data){

}

function delete($id){

}