<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembayaran - {{$siswa->nama_siswa}}</title>
	<style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}
			/* @page { size: with x height */
			/*@page { size: 20cm 9.5cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			/*body { border: 2px solid #000000;  }*/
	</style>
	<script type="text/javascript">
		var beforePrint = function() {
		};
		var afterPrint = function() {
			document.location.href = '/psb/detailPSB/{{$siswa->NIS}}';
		};
		if (window.matchMedia) {
			var mediaQueryList = window.matchMedia('print');
			mediaQueryList.addListener(function(mql) {
				if (mql.matches) {
					beforePrint();
				} else {
					afterPrint();
				}
			});
		}
		window.onbeforeprint = beforePrint;
		window.onafterprint = afterPrint;
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">   
                            <div class="card-header">
                            	<div class="lead">
                            		<img src="/img/big-logo.png" width="50px" />
                            		PONDOK PESANTREN AL-ISLAH TAJUG
                            	</div>
                            </div>
                            <div class="card-body">
                            	<table cellpadding="5" >
                            			<tr>
                            				<h5><b>NOTA PEMBAYARAN SISWA BARU</b></h5>
                            			</tr>
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
                                        <tr>
                                            <td><h5><b>TAHUN AJARAN</b></h5></td>
                                            <td>: {{$thn_ajaran}}</td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header">
                                    <strong class="card-title">Rincian</strong>
                                </div>
                                
                                <ul class="list-group list-group-flush">

                                @if(!empty(App\PSB::where('NIS', $siswa->NIS)->first()))
                                @if(App\PSB::where('id_rincian', 583010)->where('NIS', $siswa->NIS)->where('status_pembayaran', 1)->count() > 0)
                                @for($i=0; $i<count($rincian)-1; $i++)
                                    <li class="list-group-item" disabled>
                                        <a > <i class="fa fa-check-square"></i> {{$rincian[$i]->detail_rincian}} <span class="badge badge-success pull-right">Rp.{{$rincian[$i]->biaya}}</span></a>
                                    </li>
                                @endfor
                                @else
                                @foreach($psb as $psbsiswa)
                                @if($psbsiswa->NIS == $siswa->NIS && $psbsiswa->status_pembayaran == 1)
                                    <li class="list-group-item" disabled>
                                        <a > <i class="fa fa-check-square"></i> {{App\Rincian::where('id_rincian', $psbsiswa->id_rincian)->first()->detail_rincian}} <span class="badge badge-success pull-right">Rp.{{App\Rincian::where('id_rincian', $psbsiswa->id_rincian)->first()->biaya}} </span></a>
                                    </li>
                                @endif
                                @endforeach
                                @endif 
                                @endif
                                </ul>
                            </section>
                        </aside>
                    </div>


			        <div class="col-md-12">
			        	<table>
			        		<td width="600px"></td>
			        		<td>
			        			<br>
						        <br>
						        <br>
						        <br>
						        <br>
			        			<table cellpadding="4">
					        	<tr>
									<td>&nbsp;</td>
									<td>____________________________________________________</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><div class="value">{{$bendahara}}</div></td>
								</tr>
								</table>
			        		</td>
			        	</table>
			        </div>
                </div>
            </div>

	
	<hr>
	<script src="/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			window.print();
		});
	</script>
	<?php 
 
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 
	?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>