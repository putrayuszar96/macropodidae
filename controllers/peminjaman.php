<?php

include '../models/koneksi.php';
include '../models/peminjaman.php';

if($koneksi_berhasil == TRUE)
{
    $aksi = $_GET['action'];

    if($aksi == 'read'){
        $filter = [];

        if(isset($_POST)){
            $data = ambil_peminjaman($_POST);
        }else{
            $data = ambil_peminjaman($_POST);
        }

        echo json_encode(['status' => 'ok', 'data' => $data]);
    }else if($aksi == 'create'){
        
    }else if($aksi == 'update'){

    }else if($aksi == 'delete'){

    }else{

    }
}else
{

}