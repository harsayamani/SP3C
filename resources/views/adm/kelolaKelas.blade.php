<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Kelas | Admin</title>
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

                    <li>
                        <a href="/admin/datasiswa/kelolaSiswa"><i class="menu-icon fa fa-list"></i>Kelola Data Siswa </a>
                    </li>

                    <li class="active">
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
                {{session()->get('alert success')}}
            </div>
        @endif

        @if (session()->has('alert danger'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('alert danger')}}
            </div>
        @endif

        @if (session()->has('alert warning'))
            <div class="alert alert-warning" role="alert">
                {{session()->get('alert warning')}}
            </div>
        @endif

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Kelas</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Siswa</a></li>
                                    <li class="active">Kelas</li>
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
    
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Kelola Kelas</strong>
                        </div>
                        <div class="card-body">

                            <div class="col-lg-3 col-md-6">
                                <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahKelas"><i class="fa fa-plus-square"></i>
                                  Tambah Kelas
                                </button>
                            </div>

                            <!-- Modal Tambah Data-->

                            <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mediumModalLabel">Tambah Kelas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>      
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/datasiswa/kelas/tambahKelas') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                {{ csrf_field()}}
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="number-input" class=" form-control-label">ID</label></div>
                                                    <div class="col-12 col-md-9"><input readonly type="number" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas " class="form-control" 
                                                    @if(!empty(App\Kelas::all()))value="{{App\Kelas::all()->last()->id_kelas+1}}" 
                                                    @else
                                                    value="835001" 
                                                    @endif required><small class="form-text text-muted">ID harus 6 digit</small></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Kelas</label></div>
                                                    <div class="col-12 col-md-9"><input type="text" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas " class="form-control" required><small class="form-text text-muted">Tuliskan nama kelas disini</small></div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="id_jenjang" class=" form-control-label">Jenjang</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="id_jenjang" id="id_jenjang" class="form-control">
                                                            <option value="0">---Pilih Jenjang---</option>
                                                            @foreach($data_jenjang as $jenjang)
                                                            <option value="{{$jenjang->id_jenjang}}">{{$jenjang->nama_jenjang}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </form>
                                        </div>    
                                    </div>
                                </div>
                            </div>

                            <br>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="row">No.</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jenjang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_kelas as $kelas)
                                    <tr>
                                        <td scope="row">{{$i = $i+1}}</td>
                                        <td>{{$kelas->nama_kelas}}</td>
                                        <td>{{App\Jenjang::where('id_jenjang', $kelas->id_jenjang)->first()->nama_jenjang}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" 
                                            data-target="#updateKelas" 
                                            data-toggle="modal" 
                                            data-id_kelas="{{$kelas->id_kelas}}"
                                            data-nama_kelas="{{$kelas->nama_kelas}}"
                                            data-nama_jenjang="{{$kelas->id_jenjang}}">
                                            <i class="fa fa-edit"></i>
                                            &nbsp; Ubah Data
                                            </button>
                
                                            <a href="/admin/datasiswa/kelas/{{$kelas->id_kelas}}/hapusKelas" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Modal Ubah Data-->

                            <div class="modal fade" id="updateKelas" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mediumModalLabel">Ubah Kelas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                                
                                        <form action="{{ url('/admin/datasiswa/kelas/ubahKelas') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                            {{ csrf_field() }}
                                            <div class="modal-body">

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label class=" form-control-label">ID_Kelas</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="id_kelas" name="id_kelas" class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Nama Kelas</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="id_jenjang" class=" form-control-label">Jenjang</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="id_jenjang" id="id_jenjang" class="form-control">
                                                            <option value="0">---Pilih Jenjang---</option>
                                                            @foreach($data_jenjang as $jenjang)
                                                            <option value="{{$jenjang->id_jenjang}}">{{$jenjang->nama_jenjang}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>                 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--Local Stuff-->
    <script type="text/javascript">
        $(document).ready(function(){
              $('#updateKelas').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget); // Button that triggered the modal
              var idKelas = button.data('id_kelas'); // Extract info from data-* attributes
              var namaKelas = button.data('nama_kelas');
              var idJenjang = button.data('nama_jenjang');
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this);
              modal.find('.modal-body #id_kelas').val(idKelas);
              modal.find('.modal-body #nama_kelas').val(namaKelas);
              modal.find('.modal-body #id_jenjang').val(idJenjang);
            });
        }); 
    </script> 

</body>
</html>
