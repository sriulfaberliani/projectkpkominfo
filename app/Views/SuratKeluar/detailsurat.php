<!-- Begin Page Content -->
<div class="container-fluid">



</div>
    <div class="col-md">
	<button class="btn btn-primary btn-icon-split" onclick="window.print()" ><span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>  <span class="text">Print</span></button>
	</div>
 
    
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: justify;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
			text-transform: uppercase; 
		}
		table tr td {
			font-size: 13px;
		}
		p {
			text-indent: 25px;
			margin:0;
		}
		.ratakirikanan { 
			text-align: justify; 
		}
		

	</style>
</head>
<body>
	<br><br>
	<center>
		<table>
			<tr>
				<td><img src="/assets/img/kotapyk.png" width="130" height="90"></td>
				<td>
				<center>
					<font size="4"><b>PEMERINTAH KOTA PAYAKUMBUH</b></font><br>
					<font size="4"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></font><br>
					<font size="2">Lantai 3 Gedung Kantor Walikota Payakumbuh Jl. Veteran No. 70 Kota Payakumbuh</font><br>
					<font size="2"><i>Email : dinas.kominfo@payakumbuhkota.go.id</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table width="625">
			<tr class="text2">
				<td width ="70">
					Nomor<br>
					Lampiran <br>
					Perihal <br>
					<br>
					<br>
					<br>
				</td>
				<td width="350">
					: <?php echo $detail['no_suratkeluar']?><br>
					: <?php echo $detail['lampiran']?><br>
					: <b><u><?php echo $detail['perihal']?></b></u><br>
					<br>
					<br>
					<br>
				</td>
				<td >
					Payakumbuh, <?php echo $detail['tgl_pembuatansk']?><br>
					<p>Kepada : <br>
					Yth. Sdr/i. <?php echo $detail['tujuan_sk']?><br>
					di- <br>
					<p><b> tempat </b> </p>
				</td>
			</tr>
		</table>
		</table>
		
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2"><b> Dengan hormat, </b></font>
		       </td>
		    </tr>
		</table>
		<table width="625">
			<tr class="text2" >
		       <td class="ratakirikanan">
			       <font size="2"> <?php echo $detail['isi_sk']?></font>
		       </td>
		    </tr>
		</table>

		</table>
		<table width="625">
			<tr class="text2" >
		       <td>
			       <font size="2"> Demikianlah disampaikan, atas perhatiannya diucapkan terima kasih.</font>
				</td>
		    </tr>
		</table>
		<br>
		</table>
		
		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<center>
				<td class="text" >
					<?php echo $detail['jabatan_pembuatsurat']?><br><br><br><br>
					<b><u><?php echo $detail['nama_pembuatsurat']?></u></b><br>
					NIP.<?php echo $detail['nip_pembuatsurat']?>
				</td>
			</tr>
	     </table>
	</center>
	<br><br><br><br>
</body>
</html>

