
<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
</head>
<style>
	@media only screen and (max-width : 640px) {
	
	table[class="container"] {
        width: 98% !important;
    } 
    td[class="bodyCopy"] p {
		padding: 0 15px !important; 
		text-align: left !important;
	}
    td[class="spacer"] {
	    width: 15px !important;
    }
    td[class="belowFeature"] {
	    width: 95% !important;
	    display: inline-block;
	    padding-left: 15px;
	    margin-bottom: 20px;
    }
    td[class="belowFeature"] img {
	    float: left;
	    margin-right: 15px;
    }
    
    table[class="belowConsoles"] {
		width: 100% !important;
		display: inline-block;
	}

	table[class="belowConsoles"] img {
		margin-right: 15px;
		margin-bottom: 15px;
		float: left;
	}
   
	
	}
	
	@media only screen and (min-width: 481px) and (max-width: 560px) {
	
	td[class="Logo"] {
		width: 560px !important;
		text-align: center;
	}
	
	td[class="viewWebsite"] {
		width: 560px !important;
		height: inherit !important;
		text-align: center;
	}    

	}
	
	@media only screen and (min-width: 250px) and (max-width: 480px) {
	
	td[class="Logo"] {
		width: 480px !important;
		text-align: center;
	}
	
	td[class="viewWebsite"] {
		width: 480px !important;
		height: inherit !important;
		text-align: center;
	}
	
	td[class="spacer"] {
	    display: none !important;
    }
	
	td[class="bodyCopy"] p {
		padding: 0 15px !important; 
		text-align: left !important;
	}
	
	td[class="bodyCopy"] h1 {
		padding: 0 10px !important;
	}
	
	h1, h2 {
		line-height: 120% !important;
	}
	
	td[class="force-width"] {width: 98% !important; padding: 0 10px;}
	
	[class="consoleImage"] {
		display: inline-block;
	}

	[class="consoleImage"] img {
		text-align: center !important;
		display: inline-block;
	}

	table[class="belowConsoles"] {
		text-align: center;
		float: none;
		margin-bottom: 15px;
		width: 100% !important;
	}

	table[class="belowConsoles"] img {
		margin-bottom: 0;
	}
	
	}

.header-img{
  clip: auto rect(100px,100px,100px,100px);
}
</style>
<body bgcolor="white" style="font-family: Arial; background-color:white;">
	<table align="center" cellpadding="0" cellspacing="0" class="container" width="630" style="border-radius: 5pt;">
		<tr>
			<td>
				<table align="left">
					<tr>
						<td class="Logo" width="200"><img src="http://i66.tinypic.com/2af0586.png" width="80"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table align="center" bgcolor="#FCFCFC" cellpadding="0" cellspacing="0" class="container" style="line-height: 135%;" width="630">
		<tr>
			<td bgcolor="#FCFCFC" colspan="3" height="10" width="100%">&nbsp;</td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FCFCFC" colspan="3"><img class="header-img" src="http://i63.tinypic.com/rkzwxj.jpg" width="100%"></td>
		</tr>
		<tr>
			<td colspan="3" height="15">&nbsp;</td>
		</tr>
		<tr>
			<td bgcolor="#FCFCFC" colspan="3">
				<table>
					<tr>
						<td class="spacer" width="30">&nbsp;</td>
						<td align="center" class="bodyCopy">
							<h1 class="headline" style="font-family: Arial, Helvetica, sans-serif; font-size: 32px; color: #404040; margin-top: 0; margin-bottom: 20px; padding: 0; line-height: 135%">Status pengajuan kamu berhasil diubah!</h1>
							@if($status == 'diterima')
								<p style="font-family: Arial, Helvetica, sans-serif; color: #555555; font-size: 14px; padding: 0 40px;text-align:left;">Pengajuan kamu berhasil diterima dan klaim akan ditransfer kurang dari 24jam saat email ini diberikan!</p><br>
							@elseif($status == 'ditolak')
								<p style="font-family: Arial, Helvetica, sans-serif; color: #555555; font-size: 14px; padding: 0 40px;text-align:left;">Pengajuan kamu tidak berhasil diterima. Jika anda kurang setuju dengan keputusan ini, silahkan mengajukan kembali dan semoga diterima!</p><br>
							@elseif($status == 'dibatalkan')
								<p style="font-family: Arial, Helvetica, sans-serif; color: #555555; font-size: 14px; padding: 0 40px;text-align:left;">Pengajuan kamu berhasil dibatalkan. Jangan lupa untuk mengajukan kembali ya!</p><br>
							@elseif($status == 'menunggu persetujuan finance')
								<p style="font-family: Arial, Helvetica, sans-serif; color: #555555; font-size: 14px; padding: 0 40px;text-align:left;">Pengajuan kamu berhasil diterima oleh HRM. sekarang pengajuan kamu hanya perlu disetujui oleh Finance dan klaim kamu bisa dapat diberikan!</p><br>
							@endif
							<table>
								<tr><th>Kode Pengajuan:</th><td>{{ $dataTarget -> kode_data_klaim}}</td></tr>
								<tr><th>Nama Pengaju:</th><td>{{ $dataTarget->employee -> nama}}</td></tr>
								<tr><th>Status Pengajuan:</th><td>{{ $dataTarget -> status}}</td></tr>
							</table><br>
							<p style="font-family: Arial, Helvetica, sans-serif; color: #555555; font-size: 14px; padding: 0 40px;text-align:left;">Salam, Harmonis</p><br>
							<br>
							<p style="font-family: Arial, Helvetica, sans-serif; color: #555555; font-size: 12px; padding: 0 40px;text-align:left;">Support: Jika memiliki masalah dapat dikonsultasikan kepada <a href="#">HR Support</a></p><br>
						</td>
						<td class="spacer" width="30">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
