<?php
require 'function.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Manajemen Arsip</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Barang Masuk
                            </a>    
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gudang  
                                <div classa="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="">KC Langsa</a>
                                    <a class="nav-link" href="">Kab. Aceh Tamiang</a>
                                    <a class="nav-link" href="">Kab. Aceh Timur</a>
                                    <a class="nav-link" href="">Kab. Aceh Tenggara</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="rak.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Setting Rak
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                         Data Berkas Cabang Langsa
                </div>
                <div class="card-body">
                    <div id="message-alert"></div>
                    <div class="table-responsive"> 
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name Berkas</th>
                                <th>Bidang</th>
                                <th>Lokasi Berkas</th>
                                <th>Lokasi Rak</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tfoot>
                                <th>Name Berkas</th>
                                <th>Bidang</th>
                                <th>Lokasi Berkas</th>
                                <th>Lokasi Rak</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tfoot>
                            <tbody>
                                <td>Klaim PMR</td>
                                <td>PMR</td>
                                <td>Langsa</td>
                                <td>Rak A</td>
                                <td>20/07/2021</td>
                                <td>Aktif</td>
                                <td><a href="update.php"><i class="fa fa-eye"></i></a> <a href="#" id="file-keluar" data-value="id-surat"><i class="fa fa-file ml-2"></i></a><a href="#"><i class="fa fa-trash ml-2"></a></i> </td>
                            </tbody>
                        </thead>
                        </div>
                </div>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        <script>
            $('#file-keluar').on('click', function() {
                let idSurat = $(this).data('value');
                console.log(idSurat)

                $.ajax({
                    url: 'model.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        idSurat: idSurat,
                        action: 'keluar'
                    },
                    success: function (response){
                        let message = '';
                        console.log(response)

                        if(response.result == true){
                            message += '<span class="text-success">Dokumen telah keluar</span>'
                            $('#message-alert').html(message)
                        }else{
                            message += '<span class="text-danger">Dokumen gagal keluar</span>'
                            $('#message-alert').html(message)
                        }
                    },
                    error: function () {
                        console.log('error')
                    }
                })
            })
        </script>
    </body>
</html>
