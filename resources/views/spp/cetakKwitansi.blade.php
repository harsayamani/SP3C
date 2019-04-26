<!DOCTYPE html>
<html>
<head>
	<title>Kwitansi SPP - {{$spp->id_spp}}</title>
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
			@page { size: 20cm 9.5cm; margin: 0px; }
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
			document.location.href = '/spp/kembali';
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
						<td><div class="value">: {{$spp->id_spp}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Telah terima dari</div></td>
						<td><div class="value">: {{App\Siswa::where('NIS', $spp->NIS)->first()->nama_siswa}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Untuk pembayaran</div></td>
						<td><div class="value">: SPP</div></td>
					</tr>
					<tr>
						<td><div class="lead">Bulan</div></td>
						<td><div class="value">: {{App\BulanSPP::where('id_bulan', $spp->id_bulan)->first()->nama_bulan}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Tanggal</div></td>
						<td><div class="value">: {{$spp->tgl_pembayaran}}</div></td>
					</tr>
					<tr>
						<td><div class="lead">Uang sejumlah</div></td>
						<td><div class="value-big">: Rp. {{$spp->nominal_spp}},-</div></td>
					</tr>
					<tr>
						<td><div class="lead">Terbilang</div></td>
						<td><div class="value">: {{$spp->nominal_spp/1000}} ribu rupiah</div></td>
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
</body>
</html>