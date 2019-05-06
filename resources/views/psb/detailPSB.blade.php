<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail PSB {{$siswa->NIS}} | Pembayaran PSB</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />  
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
                        <a href="/psb/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li class="menu-title">Fitur Utama</li><!-- /.menu-title -->
                    <li class="active">
                        <a href="/psb/pembayaranPSB"><i class="menu-icon fa fa-table"></i>Pembayaran PSB </a>
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
                               
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">   
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Profil Siswa</strong>
                            </div>
                            <div class="card-body">
                                    <table cellpadding="5" >
                                        <tr>
                                            <td><h5><b>NIS</b></h5></td>
                                            <td>: {{$siswa->NIS}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5><b>NAMA</b></h5></td>
                                            <td>: {{$siswa->nama_siswa}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5><b>KELAS</b></h5></td>
                                            <td>: {{App\Kelas::where('id_kelas', $siswa->id_kelas)->first()->nama_kelas}}</td>
                                        </tr>
                                    </table>
                            </div>
                            <div class="card-text text-sm-center">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#tambah"><i class="fa fa-money"></i>
                            Bayar Pendaftar Siswa Baru
                         </button>
                    </div>

                    <br>
                    <br>
                    <br>

                    <div class="col-lg-4">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header">
                                    <strong class="card-title">Rincian</strong>
                                </div>
                                
                                <ul class="list-group list-group-flush">

                                @if(!empty(App\PSB::where('NIS', $siswa->NIS)->first()))
                                @foreach($psb as $psbsiswa)
                                @if($psbsiswa->NIS == $siswa->NIS && $psbsiswa->status_pembayaran == 1)
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-check-square"></i> {{App\Rincian::where('id_rincian', $psbsiswa->id_rincian)->first()->detail_rincian}} <span class="badge badge-success pull-right">Lunas</span></a>
                                    </li>
                                @endif
                                @endforeach
                                @endif
                                </ul>
                            </section>
                        </aside>
                    </div>

                    <!-- Modal Tambah Data-->

                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="mediumModalLabel"><b>PEMBAYARAN</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>      
                                <div class="modal-body">
                                    <form action="{{ url('/psb/bayarPSB') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {{ csrf_field()}}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">NIS</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="NIS" name="NIS" placeholder="Masukkan Nama Jenjang " class="form-control" value="{{$siswa->NIS}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="id_rincian" class=" form-control-label">Rincian</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="id_rincian" id="id_rincian" class="form-control">
                                                    <option value="">---Pilih Rincian---</option>
                                                    @foreach($rincian as $rinc)
                                                    <option value="{{$rinc->id_rincian}}">{{$rinc->detail_rincian}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Tanggal Pembayaran</label>
                                            </div>
                                            <div class="col-12 col-md-9" >
                                                <input type="text" id="tgl_pembayaran" name="tgl_pembayaran" placeholder="Masukkan Tanggal Pembayaran" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Nominal</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="nominal" name="nominal" placeholder="Masukkan Nominal " class="form-control" required><small class="form-text text-muted">Tuliskan nominal disini</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </div>

                    <!-- Modal Ubah Data-->

                    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="mediumModalLabel"><b>PELUNASAN</b></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                                    
                                    <form action="/psb/lunasiPSB" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">ID</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="id_psb" name="id_psb" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Pelunasan</label></div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="tgl" name="tgl" placeholder="Masukkan Tanggal Pelunasan" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nominal Pelunasan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nominal" name="nominal" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>                 

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Pelunasan Pembayaran</strong>
                            </div>
                        
                            <div class="card-body">

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rincian</th>
                                            <th>Tgl</th>
                                            <th>Nominal Pelunasan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($psb as $psb)
                                    @if($psb->status_pembayaran == 0 && $psb->NIS == $siswa->NIS)
                                        <tr>
                                            <td>{{App\Rincian::where('id_rincian', $psb->id_rincian)->first()->detail_rincian}}</td>
                                            <td>{{$psb->tgl_pembayaran}}</td>
                                            <td>

                                            Rp{{App\Rincian::where('id_rincian', $psb->id_rincian)->first()->biaya-$psb->nominal}}

                                            </td>
                                            <td>
                                                <button class="btn btn-danger" >Belum Lunas</button>
                                            </td>
                                            <td>
                                            
                                            <button type="button" class="btn btn-outline-success btn-sm" 
                                                data-target="#update" 
                                                data-toggle="modal" 
                                                data-id_psb="{{$psb->id_psb}}"
                                                data-nominal="{{App\Rincian::where('id_rincian', $psb->id_rincian)->first()->biaya-$psb->nominal}}"
                                                >
                                                <i class="fa fa-edit"></i>
                                                &nbsp; Lunasi
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--Local Stuff-->
    <script type="text/javascript">
        $(document).ready(function(){
              $('#update').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget); // Button that triggered the modal
              // Extract info from data-* attributes
              var nominal = button.data('nominal');
              var idPSB = button.data('id_psb');
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this);
              modal.find('.modal-body #nominal').val(nominal);
              modal.find('.modal-body #id_psb').val(idPSB);
            });
        }); 
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> 
    <script>
        $('#tgl_pembayaran').datepicker();
    </script>
    <script>
        $('#tgl').datepicker();
    </script>
    
</body>
</html>
