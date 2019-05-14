<!DOCTYPE html>
<html>
<head>
	<title>Kwitansi PSB - {{$siswa->NIS}}</title>
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
			@page { size: 20cm 13cm; margin: 0px; }
			/*@page {
				size: A4;
				margin : 0px;
			}*/
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
</head>
<body>
	

	<table border="1px">
		<tr>
			<td width="80px"><img src="/img/big-logo.png" width="80px" /></td>
			<td>
				<table cellpadding="4">
					<tr>
						<td width="200px"><div class="lead">No kwitansi</td>
						<td><div class="value">: {{uniqid()}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Telah terima dari</div></td>
						<td><div class="value">: {{$siswa->nama_siswa}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Untuk pembayaran</div></td>
						@if(count($psb)==1)
						<td>
						@for($i=0; $i<count($rincian)-1; $i++)
						<div class="value">: - {{$rincian[$i]->detail_rincian}}
						</div>
						@endfor
						@endif
						@if(count($psb)>1)
						<td>
						@for($i=0; $i<count($rincian)-1; $i++)
						<div class="value">: - {{$rincian[$i]->detail_rincian}}
						</div>
						@endfor
						@endif
						</td>
						
					</tr>
						<td><div class="lead">Tanggal</div></td>
						<td><div class="value">: {{$tgl_pembayaran}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Uang sejumlah</div></td>
						<td><div class="value-big">: Rp. {{$total}},-</div></td>
					</tr>
					<tr>
						<td><div class="lead">Terbilang</div></td>
						<td><div class="value">: {{penyebut($total)}} rupiah</div></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td><div class="lead">Kasir:</div></td>
						<td>&nbsp;</td>
					</tr>
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
		</tr>
	</table>
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
</body>
</html>