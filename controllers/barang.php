<?php

include '../models/koneksi.php';
include '../models/barang.php';

if($koneksi_berhasil == TRUE)
{
    $aksi = $_GET['action'];

    if($aksi == 'read'){
        $filter = [];

        if(isset($_POST)){
            if(isset($_POST['cabang'])){
                $filter['cabang'] = $_POST['cabang'];
            }

            $data = read_barang($filter);

            $data = membuatBarang($data);
        }else{
            $data = read_barang($filter);
        }

        echo json_encode(['status' => 'ok', 'data' => $data]);
    }else if($aksi == 'create'){
        $insert = create_barang($_POST);

        if($insert == TRUE){
            $status = 'ok';
        }else{
            $status = $insert['error'];
        }

        echo json_encode(['status' => $status]);

    }else if($aksi == 'update'){

    }else if($aksi == 'delete'){

    }else if($aksi == 'pinjam'){
        include '../models/peminjaman.php';

        $insert = create_peminjaman($_POST);

        if($insert == TRUE){
            $status = 'ok';
        }else{
            $status = $insert['error'];
        }

        echo json_encode(['status' => $status]);
    }else{

    }
}else
{

}

function membuatBarang($data){
    $result = array();

    foreach($data as $d){
        $single = array(
            'nama_barang' => $d['nama_barang'],
            'asal_barang' => array(
                'divisi' => $d['nama_divisi'],
                'cabang' => $d['nama_cabang'],
            ),
            'uploader' => $d['nama_uploader'],
            'status_pinjam' => $d['status_pinjam'],
            'rak_posisi' => $d['rak_posisi'],
            'action' => array(
                'uuid_barang' => $d['uuid_barang'],
                'status_pinjam' => $d['status_pinjam'],
            ),
        );

        $result[] = $single;
    }

    return $result;
}