<!DOCTYPE html>
<html>
<head>
	<title>&nbsp;</title>
</head>
<body>
	<h2 style="margin-left: 70px">TOGA MEDIA</h2>	
	<table style="margin-top: -30px">
		<tr>
			<td>No Nota : <?=$dataTransaksi->id_transaksi?></td>
			<td>Pembeli : <?=$dataTransaksi->nama_pembeli?></td>
		</tr>
		<tr>
			<td>________________________</td>
			<td>_____________</td>
		</tr>
		<?php $i=0;foreach ($detail_history as $detail):$i++;?>
		<tr>				
			<td><?=$detail->nama_barang?></td>                        			    
		    <td>Rp.<?=number_format($detail->harga*$detail->jumlah)?></td>
		</tr>
		<tr>
			<td><?=$detail->jumlah?> @Rp.<?=number_format($detail->harga)?></td>
			 
		</tr>
		<?php endforeach ?>
		<br>
		<tr>
			<td>________________________</td>
			<td>_____________</td>
		</tr>
		<tr>
			 <td><b>Grandtotal</b></td>
			 <td><b>Rp.<?=number_format($dataTransaksi->total)?></b></td>  
		</tr>
		<tr>
			 <td>Bayar</td>
			 <td>Rp.<?=number_format($dataTransaksi->uang)?></td>  
		</tr>
		<tr>
			 <td><b>Kembali<b></td>
			 <td><b>Rp.<?=number_format($dataTransaksi->uang-$dataTransaksi->total)?></b></td>  
		</tr>
		<tr>
			<td>________________________</td>
			<td>_____________</td>
		</tr>
		<tr>
			<td>Tanggal : <?=$dataTransaksi->tanggal_beli?></td>
			<td>Admin : <?=$dataTransaksi->nama_user?></td>
		</tr>
	</table>
	
	<script type="text/javascript">
		window.print();		
	</script>
</body>
</html>