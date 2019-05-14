<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kelola Bulan SPP | Admin</title>
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
                        <a href="/admin/datasiswa/kelolaSiswa"><i class="menu-icon fa fa-table"></i>Kelola Data Siswa </a>
                    </li>

                    <li>
                        <a href="/admin/datasiswa/kelas"><i class="menu-icon fa fa-table"></i>Kelola Data Kelas </a>
                    </li>

                    <li>
                        <a href="/admin/datasiswa/jenjang"><i class="menu-icon fa fa-table"></i>Kelola Data Jenjang </a>
                    </li>

                    <li class="menu-title">Data Pembayaran Siswa</li><!-- /.menu-title -->

                    <li class= "menu-item-has-children active dropdown">
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
                                <h1>Bulan SPP</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Pembayaran SPP</a></li>
                                    <li class="active">Bulan SPP</li>
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
                                <strong class="card-title">Kelola Bulan SPP</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahJenjang"><i class="fa fa-plus-square"></i>
                                      Tambah Bulan
                                    </button>
                                </div>

                                <!-- Modal Tambah Data-->

                                <div class="modal fade" id="tambahJenjang" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Tambah Bulan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/datapembayaran/spp/bulanSPP/tambahBulan') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                    {{ csrf_field() }}
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">ID</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="id_bulan" name="id_bulan" placeholder="Masukkan ID Bulan SPP" class="form-control" @if(!empty(App\BulanSPP::all()))value="{{App\BulanSPP::all()->last()->id_bulan+1}}" 
                                                    @else
                                                    value="342001" 
                                                    @endif readonly></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Bulan</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" id="nama_bulan" name="nama_bulan" placeholder="Masukkan Nama Jenjang " class="form-control" required><small class="form-text text-muted">Tuliskan nama bulan disini</small></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="thn_ajaran" class=" form-control-label">Tahun Ajaran</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="thn_ajaran" id="thn_ajaran" class="form-control">
                                                                <option value="">---Pilih Tahun Ajaran---</option>
                                                                <option value="2019/2020">2019/2020</option>
                                                                <option value="2020/2021">2020/2021</option>
                                                                <option value="2021/2022">2021/2022</option>
                                                                <option value="2022/2023">2022/2023</option>
                                                                <option value="2023/2024">2023/2024</option>
                                                                <option value="2024/2025">2024/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya SPP SMP</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="spp_smp" name="spp_smp" placeholder="Masukkan Biaya SPP " class="form-control" required><small class="form-text text-muted">Tuliskan biaya spp disini</small></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya SPP Idady</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="spp_idady" name="spp_idady" placeholder="Masukkan Biaya SPP " class="form-control" required><small class="form-text text-muted">Tuliskan biaya spp disini</small></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya SPP SMA</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="spp_sma" name="spp_sma" placeholder="Masukkan Biaya SPP " class="form-control" required><small class="form-text text-muted">Tuliskan biaya spp disini</small></div>
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

                                <div class="modal fade" id="updateBulanSPP" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Ubah Bulan SPP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                                    
                                            <form action="{{ url('/admin/datapembayaran/spp/bulanSPP/ubahBulan') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                {{ csrf_field() }}
                                                <div class="modal-body">

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label class=" form-control-label">ID</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="id_bulan" name="id_bulan" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Bulan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_bulan" name="nama_bulan" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="thn_ajaran" class=" form-control-label">Tahun Ajaran</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="thn_ajaran" id="thn_ajaran" class="form-control">
                                                                <option value="">---Pilih Tahun Ajaran---</option>
                                                                <option value="2019/2020">2019/2020</option>
                                                                <option value="2020/2021">2020/2021</option>
                                                                <option value="2021/2022">2021/2022</option>
                                                                <option value="2022/2023">2022/2023</option>
                                                                <option value="2023/2024">2023/2024</option>
                                                                <option value="2024/2025">2024/2025</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya SPP SMP</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="spp_smp" name="spp_smp" placeholder="Masukkan Biaya SPP " class="form-control" required><small class="form-text text-muted">Tuliskan biaya spp disini</small></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya SPP Idady</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="spp_idady" name="spp_idady" placeholder="Masukkan Biaya SPP " class="form-control" required><small class="form-text text-muted">Tuliskan biaya spp disini</small></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya SPP SMA</label></div>
                                                        <div class="col-12 col-md-9"><input type="number" id="spp_sma" name="spp_sma" placeholder="Masukkan Biaya SPP " class="form-control" required><small class="form-text text-muted">Tuliskan biaya spp disini</small></div>
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
                                            <th scope="row">Id</th>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Tahun Ajaran</th>
                                            <th scope="col">Biaya SPP SMP</th>
                                            <th scope="col">Biaya SPP I'dady</th>
                                            <th scope="col">Biaya SPP SMA</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_bulan_spp as $bulan_spp)
                                        <tr>
                                            <td scope="row">{{$bulan_spp->id_bulan}}</td>
                                            <td>{{$bulan_spp->nama_bulan}}</td>
                                            <td>{{$bulan_spp->thn_ajaran}}</td>
                                            <td>Rp{{$bulan_spp->spp_smp}}</td>
                                            <td>Rp{{$bulan_spp->spp_idady}}</td>
                                            <td>Rp{{$bulan_spp->spp_sma}}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success btn-sm" 
                                                data-target="#updateBulanSPP" 
                                                data-toggle="modal" 
                                                data-id_bulan="{{$bulan_spp->id_bulan}}"
                                                data-nama_bulan="{{$bulan_spp->nama_bulan}}"
                                                data-thn_ajaran="{{$bulan_spp->thn_ajaran}}"
                                                data-spp_smp="{{$bulan_spp->spp_smp}}"
                                                data-spp_idady="{{$bulan_spp->spp_idady}}"
                                                data-spp_sma="{{$bulan_spp->spp_sma}}"
                                                <i class="fa fa-edit"></i>
                                                &nbsp; Ubah Data
                                                </button>
                    
                                                <a href="/admin/datapembayaran/spp/bulanSPP/{{$bulan_spp->id_bulan}}/hapusBulan" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
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

    <!--Local Stuff-->
    <script type="text/javascript">
        $(document).ready(function(){
              $('#updateBulanSPP').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget); // Button that triggered the modal
              var idBulan = button.data('id_bulan'); // Extract info from data-* attributes
              var namaBulan = button.data('nama_bulan');
              var thnAjaran = button.data('thn_ajaran');
              var sppSMP = button.data('spp_smp');
              var sppSMA = button.data('spp_sma');
              var sppIdady = button.data('spp_idady');
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this);
              modal.find('.modal-body #id_bulan').val(idBulan);
              modal.find('.modal-body #nama_bulan').val(namaBulan);
              modal.find('.modal-body #thn_ajaran').val(thnAjaran);
              modal.find('.modal-body #spp_smp').val(sppSMP);
              modal.find('.modal-body #spp_idady').val(sppIdady);
              modal.find('.modal-body #spp_sma').val(sppSMA);
            });
        }); 
    </script> 

</body>
</html>
