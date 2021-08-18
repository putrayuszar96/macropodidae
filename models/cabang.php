<?php

function create($data){

}

function read($filter){
    include '../models/koneksi.php';

    if(!empty($filter)){

    }else{
        $query = "SELECT * FROM kantor_cabang";
        $query_run = mysqli_query($koneksi, $query);

        $result = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

        return $result;
    }
}

function update($id, $data){

}

function delete($id){

}