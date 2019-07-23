<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Siswa | Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body> 
<!-- /#left-panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="/admin/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                    <li class="menu-title">Data Siswa</li><!-- /.menu-title -->

                    <li class="active">
                        <a href="/admin/datasiswa/kelolaSiswa"><i class="menu-icon fa fa-list"></i>Kelola Data Siswa </a>
                    </li>

                    <li>
                        <a href="/admin/datasiswa/kelas"><i class="menu-icon fa fa-list"></i>Kelola Data Kelas </a>
                    </li>

                    <li>
                        <a href="/admin/datasiswa/jenjang"><i class="menu-icon fa fa-list"></i>Kelola Data Jenjang </a>
                    </li>

                    <li class="menu-title">Data Pembayaran Siswa</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder"></i>Pembayaran SPP</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-file"></i><a href="/admin/datapembayaran/spp">Kelola Data</a></li>
                            <li><i class="fa fa-file"></i><a href="/admin/datapembayaran/spp/bulanSPP">Kelola Bulan SPP</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder"></i>Pembayaran Siswa Baru</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-file"></i><a href="/admin/datapembayaran/psb">Kelola Data</a></li>
                            <li><i class="fa fa-file"></i><a href="/admin/datapembayaran/psb/rincian">Kelola Rincian</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Ekstra</li><!-- /.menu-title -->
                    <li>
                        <a href="/admin/ekstra/logSistem"><i class="menu-icon fa fa-book"></i>Log Sistem</a>
                    </li>
                    <li>
                        <a href="/admin/ekstra/bantuan"><i class="menu-icon ti-help"></i>Bantuan</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">

            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="/img/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="/images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Anda Mendapatkan 3 Notifikasi</p>

                                @for($a=0; $a<3; $a++)
                                <a class="dropdown-item media" href="/admin/ekstra/log">
                                    <i class="fa fa-info"></i>
                                    <p>{{substr($log[$a]->jenis."\t".$log[$a]->aksi."\t".$log[$a]->tgl, 0, 20)."..."}}</p>
                                </a>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/boss.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>


        </header>
        <!-- /#header -->
        <!-- Content -->
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('alert success'))
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        @endif

        @if (session()->has('alert danger'))
            <div class="alert alert-danger" role="alert">
                Data berhasil dihapus
            </div>
        @endif

        @if (session()->has('alert warning'))
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        @endif

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Siswa</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Siswa</a></li>
                                    <li class="active">Siswa</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                               
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelola Siswa</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <a href="/admin/datasiswa/formSiswa" class="btn btn-info mb-1"><i class="fa fa-plus-square"></i>
                                      Tambah Siswa
                                    </a>
                                </div>


                                <br>

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenjang</th>
                                            <th>Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_siswa as $siswa)
                                        <tr>
                                            <td><?php  
                                            $i=$i+1;
                                            echo $i;
                                            ?></td>
                                            <td>{{$siswa->NIS}}</td>
                                            <td>{{$siswa->nama_siswa}}</td>
                                            <td>{{App\Kelas::where('id_kelas', $siswa->id_kelas)->first()->nama_kelas}}</td>
                                            <td>{{App\Jenjang::where('id_jenjang', App\Kelas::where('id_kelas', $siswa->id_kelas)->first()->id_jenjang)->first()->nama_jenjang}}</td>
                                            <td>{{$siswa->angkatan}}</td>
                                            <td>
                                            <a href="/admin/datasiswa/{{$siswa->NIS}}/hapusSiswa" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                                            <a href="/admin/datasiswa/{{$siswa->NIS}}/updateSiswa" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2019 Pondok Pesantren Al-Islah Tajug
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>

    <!-- /#right-panel -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="/assets/js/init/datatables-init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>   

</body>
</html>
