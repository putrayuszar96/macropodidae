<?php

//Membuat koneksi ke database
$koneksi = mysqli_connect("localhost","root","","dbarip");

if(mysqli_connect_errno()){
    $koneksi_berhasil = false;
    $error = "Koneksi database gagal! Error: " . mysqli_connect_errno() . " " . mysqli_connect_error();
}else{
    $koneksi_berhasil = true;
}