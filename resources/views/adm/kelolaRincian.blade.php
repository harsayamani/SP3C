<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Rincian PSB | Admin</title>
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

                    <li >
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

                    <li class="menu-item-has-children active dropdown">
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
                                <h1>Rincian</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Pembayaran PSB</a></li>
                                    <li class="active">Rincian</li>
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
                                <strong class="card-title">Kelola Rincian PSB</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahJenjang"><i class="fa fa-plus-square"></i>
                                      Tambah Rincian
                                    </button>
                                </div>

                                <!-- Modal Tambah Data-->

                                <div class="modal fade" id="tambahJenjang" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Tambah Rincian</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/datapembayaran/psb/rincian/tambahRincian') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                    {{ csrf_field() }}
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">ID</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="id_rincian" name="id_rincian" placeholder="Masukkan ID Rincian " class="form-control" @if(!empty(App\Rincian::all()))value="{{App\Rincian::all()->last()->id_rincian+1}}" 
                                                    @else
                                                    value="342001" 
                                                    @endif readonly></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Detail Rincian</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="detail_rincian" name="detail_rincian" placeholder="Masukkan Detail Rincian " class="form-control" required><small class="form-text text-muted">Tuliskan detail rincian disini</small></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="biaya" name="biaya" placeholder="Masukkan Biaya Rincian " class="form-control" required><small class="form-text text-muted">Tuliskan biaya rincian</small></div>
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

                                <!-- Modal Ubah Data-->

                                <div class="modal fade" id="updateJenjang" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Ubah Rincian PSB</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>                   
                                            <form action="{{ url('/admin/datapembayaran/psb/rincian/ubahRincian') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label class=" form-control-label">ID_Rincian</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_rincian" name="id_rincian" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Detail Rincian</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="detail_rincian" name="detail_rincian" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Biaya</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="biaya" name="biaya" class="form-control" required>
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

                                <br>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="row">ID Rincian</th>
                                            <th scope="col">Detail Rincian</th>
                                            <th scope="col">Biaya</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_rincian as $rincian)
                                        <tr>
                                            <td scope="row">{{$rincian->id_rincian}}</td>
                                            <td>{{$rincian->detail_rincian}}</td>
                                            <td>Rp{{$rincian->biaya}}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success btn-sm" 
                                                data-target="#updateJenjang" 
                                                data-toggle="modal" 
                                                data-id_rincian="{{$rincian->id_rincian}}"
                                                data-detail_rincian="{{$rincian->detail_rincian}}"
                                                data-biaya="{{$rincian->biaya}}">
                                                <i class="fa fa-edit"></i>
                                                &nbsp; Ubah Data
                                                </button>
                    
                                                <a href="/admin/datapembayaran/psb/rincian/{{$rincian->id_rincian}}/hapusRincian" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
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
              $('#updateJenjang').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget); // Button that triggered the modal
              var idRincian = button.data('id_rincian'); // Extract info from data-* attributes
              var detailRincian = button.data('detail_rincian');
              var biaya = button.data('biaya');
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this);
              modal.find('.modal-body #id_rincian').val(idRincian);
              modal.find('.modal-body #detail_rincian').val(detailRincian);
              modal.find('.modal-body #biaya').val(biaya);             
            });
        }); 
    </script> 

</body>
</html>
