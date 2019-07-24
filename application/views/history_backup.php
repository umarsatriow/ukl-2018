<div class="panel">
  <div class="panel-heading">
    <div class="panel-title">
      <a style="text-decoration: none" href="<?=base_url()?>" ><i style="font-size: 20px" class="lnr lnr-home"></i></a> History Transaksi
    </div>
  </div>
  <div class="panel-body">
    <?php if ($this->session->flashdata('pesan')!=""): ?>
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-info-circle"></i>
        <?=$this->session->flashdata('pesan')?>
      </div>
    <?php endif ?>    
   <?php if ($tampil_transaksi != null): ?>
      <table class="table">
      <thead>
        <tr>
          <th>Id Transaksi</th>
          <th>Nama User</th> 
          <th>Nama Pembeli</th>         
          <th>Total Belanja</th>
          <th>Tanggal Beli</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tampil_transaksi as $transaksi): ?>
          <tr>
            <td><?=$transaksi->id_transaksi?></td>
            <td><?=$transaksi->nama_user?></td> 
            <td><?=$transaksi->nama_pembeli?></td> 
            <td>Rp.<?=number_format($transaksi->total)?></td>   
            <td><?=$transaksi->tanggal_beli?></td>          
            <td>
              <a href="<?=base_url('index.php/history/detail/'.$transaksi->id_transaksi)?>" class="btn btn-warning">Detail</a>
              <a href="<?=base_url('index.php/cetak/nota/'.$transaksi->id_transaksi)?>" class="btn btn-info">Cetak Nota</a>
            </td>
            </div>
          </tr>          
        <?php endforeach ?>
      </tbody>
    </table>
   <?php endif ?>    
  </div>
</div>