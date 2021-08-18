<?php

include '../models/koneksi.php';
include '../models/rak.php';

if($koneksi_berhasil == TRUE)
{
    $aksi = $_GET['action'];

    if($aksi == 'read'){
        $filter = [];

        if(isset($_POST)){
            $data = read_rak($filter);
        }else{
            $data = read_rak($filter);
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