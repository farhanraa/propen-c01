<!DOCTYPE html>
	<head>
		<title>Report</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		<style>
			img {
			    float: right;
			}

			th{
				font-size: 16px;
			}
		</style>		
	</head>
	<body>
		<div class="white-header" style="padding-left: 230px; font-size: 22px;">
           	<strong >Laporan Bulan {{$report_data -> bulan}} {{$report_data -> tahun}}</strong>
        </div>

		<div class="white-header" style="padding-left: 280px; font-size: 18px;">
        	<strong >Cabang {{$report_data -> nama_cabang}}</strong>
		</div>
		<div class="container">
			<div>
				<img src="../public/img/megacapital.png" width="185" height="120">
		</div>

		<table>
			<thead>
				<tr>
					<th>Kode Report</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> kode_report}}</td>
				</tr>
			</tbody>
		</table><br>

		<table>
			<thead>
				<tr>
					<th>Jenis Report</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> jenis_report}}</td>
				</tr>
			</tbody>
		</table><br>			
		
		<table>
			<thead>
				<tr>
					<th>Periode</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> bulan}} {{$report_data -> tahun}}</td>
				</tr>
			</tbody>
		</table><br>			


		<table>
			<thead>
				<tr>
					<th>Total Pengajuan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> total_pengajuan}}</td>
				</tr>
			</tbody>
		</table><br>	

		<table>
			<thead>
				<tr>
					<th>Total Pengajuan Diterima</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> total_pengajuan_diterima}}</td>
				</tr>
			</tbody>
		</table><br>

		<table>
			<thead>
				<tr>
					<th>Total Pengajuan Ditolak</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> total_pengajuan_ditolak}}</td>
				</tr>
			</tbody>
		</table><br>			

		<table>
			<thead>
				<tr>
					<th>Total Pengajuan Dibatalkan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$report_data -> total_pengajuan_dibatalkan}}</td>
				</tr>
			</tbody>
		</table><br>
	
		@if($report_data -> jenis_report === "Claim")
		<h4 class="font-weight-bold">Total Nominal</h4>
		<h5>{{$report_data -> total_nominal}}</h5>
		@endif

		@if($report_data -> jenis_report === 'Izin')
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Alasan</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Jenis</th>
				</tr>	
			</thead>
			<tbody>
				@foreach($data_report as $data)
				<tr>
					<td>{{$data -> nama}}</td>
					<td>{{$data -> alasan}}</td>
					<td>{{$data -> tanggal_permohonan}}</td>
					<td>{{ \Carbon\Carbon::parse($data -> waktu)->format('H:i')}}</td>
					<td>{{$data -> jenis}}</td>
				@endforeach
				</tr>
			</tbody>
		</table>

		@elseif($report_data -> jenis_report === 'Cuti')
		<table class="table table-condensed" >			
			<thead>
				<tr>
					<th>Nama</th>
					<th left="10px">Alasan</th>
					<th left="10px">Tanggal Mulai</th>
					<th left="10px">Tanggal Selesai</th>
					<th left="10px">Jenis Cuti</th>
					<th left="10px">Pegawai Pengganti</th>			
				</tr>	
			</thead>
			<tbody>
				@foreach($data_report as $data)
				<tr>
					<td>{{$data -> nama}}</td>
					<td>{{$data -> alasan}}</td>
					<td>{{$data -> tanggal_mulai}}</td>
					<td>{{$data -> tanggal_selesai}}</td>
					<td>{{$data -> nama_jenis}}</td>
					<td>{{$data -> pegawai_pengganti}}</td>
				@endforeach
				</tr>
			</tbody>
		</table>

		@elseif($report_data -> jenis_report === 'Lembur')
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Alasan</th>
					<th>Tanggal</th>
					<th>Jam Mulai</th>
					<th>Jam Selesai</th>			
				</tr>	
			</thead>
			<tbody>
				@foreach($data_report as $data)
				<tr>					
					<td>{{$data -> nama}}</td>
					<td>{{$data -> alasan}}</td>
					<td>{{$data -> tanggal}}</td>
					<td>{{ \Carbon\Carbon::parse($data -> waktu_mulai)->format('H:i')}}</td>
					<td>{{ \Carbon\Carbon::parse($data -> waktu_selesai)->format('H:i')}}</td>
				@endforeach				
				</tr>
			</tbody>
		</table >

		@elseif($report_data -> jenis_report === 'Claim')
		<table class="table table-condensed">			
			<thead>
				<tr>
					<th>Nama</th>
					<th>Jenis Klaim</th>
					<th>Tanggal Transaksi</th>
					<th>Nominal</th>
					<th>Keterangan</th>													
				</tr>	
			</thead>
			<tbody>
				@foreach($data_report as $data)
				<tr>				
					<td>{{$data -> nama}}</td>
					<td>{{$data -> jenis}}</td>
					<td>{{$data -> tanggal_transaksi}}</td>
					<td>{{$data -> nominal_klaim}}</td>
					<td>{{$data -> keterangan}}</td>
				@endforeach
				</tr>
			</tbody>
		</table>
		@endif
		</div>
	</body> 
</html>

