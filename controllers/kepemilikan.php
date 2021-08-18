<?php

include '../models/koneksi.php';
include '../models/kepemilikan.php';

if($koneksi_berhasil == TRUE)
{
    $aksi = $_GET['action'];

    if($aksi == 'read'){
        $filter = [];

        if(isset($_POST)){
            if(isset($_POST['cabang'])){
                $filter['cabang'] = $_POST['cabang'];
            }

            $data = read_kepemilikan($filter);

            $data = membuatRak($data);
        }else{
            $data = read_kepemilikan($filter);
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

function membuatRak($data)
{
    include '../models/rak.php';
    $result = array();

    foreach($data as $d){
        $rak_tambahan_value = array();

        $rak_mulai = explode(',', $d['rak_mulai']);
        $rak_akhir = explode(',', $d['rak_akhir']);

        if($d['rak_tambahan'] != null){
            $rak_tambahan = explode(',', $d['rak_tambahan']);
        }

        $rak = show_rak($d['id_cabang']);

        $jumlah_rak = $rak_akhir[0] - $rak_mulai[0];
        $jumlah_rak *= $rak['jumlah_sublevel'];
        $jumlah_rak += $rak_akhir[1];

        if(isset($rak_tambahan)){
            $jumlah_rak += count($rak_tambahan);
        }

        if(isset($rak_tambahan)){
            foreach($rak_tambahan as $rak){
                $detil_rak = explode('-', $rak);
                
                $rak_tambahan_value[] = 'Rak '.sprintf("%03d", $detil_rak[0]).'.'.sprintf("%03d", $detil_rak[1]);
            }
        }

        $local_result = array(
            'id_divisi' => $d['id_divisi'],
            'nama_divisi' => $d['nama'],
            'jumlah_rak' => $jumlah_rak,
            'urutan_rak' => array(
                'rak_mulai' => 'Rak '.sprintf("%03d", $rak_mulai[0]).'.'.sprintf("%03d", $rak_mulai[1]),
                'rak_akhir' => 'Rak '.sprintf("%03d", $rak_akhir[0]).'.'.sprintf("%03d", $rak_akhir[1]),
                'rak_mulai_raw' => $d['rak_mulai'],
                'rak_akhir_raw' => $d['rak_akhir'],
            ),
            'jumlah_sublevel' => intval($rak['jumlah_sublevel']),
            'rak_tambahan' => $rak_tambahan_value,
        );
        
        $result[] = $local_result;
    }

    return $result;
}