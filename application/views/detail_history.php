 <div class="panel">
  <div class="panel-heading">
    <div class="panel-title">Detail Transaksi</div>
  </div>
  <div class="panel-body">
   <table class="table">
    <thead>
      <th>No</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Foto Cover</th>
      <th>Qty</th>
      <th>Harga satuan</th>
      <th>Subtotal</th>
    </thead>
    <tbody>
    <?php $i=0;foreach ($detail_history as $detail):$i++;?>
      <tr>
        <td><?=$i?></td>           
        <td><?=$detail->judul_buku?></td>                        
        <td><?=$detail->nama_kategori?></td>   
        <td><img src="<?=base_url()?>assets/img/<?=$detail->foto_cover?>"></td>   
        <td><?=$detail->jumlah?></td>   
        <td>Rp.<?=number_format($detail->harga)?></td>   
        <td>Rp.<?=number_format($detail->harga*$detail->jumlah)?></td>
      </tr>              
    <?php endforeach ?>         
      <tr>
        <td colspan="6">Grand Total</td>
        <td >Rp.<?=number_format($total->total)?></td>
      </tr>
    </tbody>
  </table>
  <a href="<?=base_url('index.php/history')?>" class="btn btn-primary">Kembali</a>
</div>
</div>