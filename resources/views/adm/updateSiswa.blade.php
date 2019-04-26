<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ubah Siswa | Admin</title>
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
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                        <a href="/admin/datasiswa/kelolaSiswa"><i class="menu-icon fa fa-table"></i>Kelola Data Siswa</a>
                    </li>

                    <li>
                        <a href="/admin/datasiswa/kelas"><i class="menu-icon fa fa-table"></i>Kelola Data Kelas </a>
                    </li>

                    <li>
                        <a href="/admin/datasiswa/jenjang"><i class="menu-icon fa fa-table"></i>Kelola Data Jenjang </a>
                    </li>

                    <li class="menu-title">Data Pembayaran Siswa</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Pembayaran SPP</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-puzzle-piece"></i><a href="/admin/datapembayaran/spp">Kelola Data</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="/admin/datapembayaran/spp/bulanSPP">Kelola Bulan SPP</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Pembayaran Siswa Baru</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-puzzle-piece"></i><a href="/admin/datapembayaran/psb">Kelola Data</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="/admin/datapembayaran/psb/rincian">Kelola Rincian</a></li>
                        </ul>
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
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
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
                                    <li class="active">Tambah Siswa</li>
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
                            <form method="post" action="{{ url('/admin/datasiswa/ubahSiswa') }}">
                            <div class="card-header"><strong>Ubah</strong> <strong>Siswa</strong></div>
                            <div class="card-body card-block">
                                                        {{ csrf_field() }}
                                <div class="form-group"><label for="NIS" class=" form-control-label">NIS</label><input type="text" id="NIS" name="NIS" value="{{$data_siswa->NIS}}" placeholder="Masukkan NIS Siswa" class="form-control" readonly></div>
                                <div class="form-group"><label for="nama_siswa" class=" form-control-label">Nama Siswa</label><input type="text" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama siswa" class="form-control" value="{{$data_siswa->nama_siswa}}" required></div>
                                <div class="form-group"><label for="id_kelas" class=" form-control-label">Kelas</label>
                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                        <option value="0">---Pilih kelas---</option>
                                        @foreach($data_kelas as $kelas)
                                        <option value="{{$kelas->id_kelas}}" @if($data_siswa->id_kelas == $kelas->id_kelas) selected @endif>{{$kelas->nama_kelas}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group"><label for="jenis_kelamin" class=" form-control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="0">---Pilih jenis kelamin---</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div> 
                                <div class="form-group"><label for="street" class=" form-control-label">Alamat</label><textarea type="text" id="alamat" name="alamat" placeholder="Masukkan alamat siswa" class="form-control" required>{{$data_siswa->alamat}}</textarea></div>
                                <div class="form-group"><label for="no_hp" class=" form-control-label">Nomor HP Siswa</label><input type="text" id="no_hp" name="no_hp" placeholder="mis.0894648273xxx" class="form-control" value="{{$data_siswa->no_hp}}" required></div>
                                <div class="form-group"><label for="nama_ortu" class=" form-control-label">Nama Orang Tua Siswa</label><input type="text" id="nama_ortu" name="nama_ortu" placeholder="Masukkan nama orang tua siswa" class="form-control" value="{{$data_siswa->nama_ortu}}" required></div>
                                <div class="form-group"><label for="no_hp_ortu" class=" form-control-label">Nomor HP Orang Tua Siswa</label><input type="text" id="no_hp_ortu" name="no_hp_ortu" placeholder="mis.0894648273xxx" class="form-control" value="{{$data_siswa->no_hp_ortu}}" required></div>
                                <div class="form-group"><label for="no_hp_ortu" class=" form-control-label">Angkatan</label><input type="text" id="angkatan" name="angkatan" placeholder="mis.2017" class="form-control" value="{{$data_siswa->angkatan}}" required></div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                            </form>
                            
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
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>

    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>
</html>
