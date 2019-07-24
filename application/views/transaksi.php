<aside id="leftsidebar" class="sidebar" hidden="">
    <!-- User Info -->
    <div class="user-info">

        <div class="menu">
            <ul class="list">

                <li class="active">

                </li>
            </ul>
        </div>
    </div>
</aside>       
    <section class="content">
        <div class="container-fluid">        
            <!-- Basic Examples -->      
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                           <div class="header">
                            <h2>
                               <a style="" href="<?=base_url()?>" ><i style="font-size: 30px;color: black" class="lnr lnr-home"></i></a> TRANSAKSI
                            </h2>                          
                          </div>  
                        <div class="body">
                            <div class="table-responsive">
                              <?php if ($tampil_buku==null): ?>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                  <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>     
                                        <th>Expired</th>            
                                        <th>Kategori</th>            
                                        <th>Harga</th>            
                                        <th>Foto</th>            
                                        <th>Produsen</th>            
                                        <th>Stok</th>   
                                        <th>Aksi</th>         
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($tampil_buku as $buku): ?>
                                      <?php if ($buku->stok<5): ?>
                                        <tr style="background-color: #f0ad4e;color:white;">         
                                      <?php elseif($buku->stok<10): ?>
                                        <tr style="background-color: #d9edf7;">   
                                      <?php endif?>
                                      <?php if ($buku->stok<1): ?>
                                      <?php else: ?>
                                       <td><?=$buku->id_barang?></td>
                                        <td><?=$buku->nama_barang?></td>       
                                        <td><?=$buku->expired?></td>
                                        <td><?=$buku->nama_kategori?></td>          
                                        <td>Rp.<?=number_format($buku->harga)?></td>
                                        <td><img style="max-width: 100px" src="<?=base_url()?>assets/img/<?=$buku->foto_cover?>"></td> 
                                        <td><?=$buku->produsen?></td>
                                        <td><?=$buku->stok?></td>
                                        <td>
                                          <a href="<?=base_url('index.php/transaksi/addcart/'.$buku->id_barang)?>" class="btn btn-primary">Tambah</a>
                                        </td>
                                      <?php endif ?>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>
                              </table>
                              <?php else: ?>
                                <center>
                                  <?php if ($this->session->userdata('level')==1): ?>
                                    <a href="<?=base_url('index.php/buku')?>" class="btn btn-primary">Tambah Barang</a>
                                  <?php else: ?>
                                    <div class="alert alert-danger" role="alert">
                                      <i class="fa fa-info-circle"></i> Silahkan Hubungi Admin
                                    </div>
                                  <?php endif ?>
                                </center>
                              <?php endif ?>
                              <?php if ($this->session->flashdata('pesan')!=""): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <i class="fa fa-info-circle"></i>
                                  <?=$this->session->flashdata('pesan')?>
                                </div>
                              <?php endif ?>
                              <?php if ($this->session->flashdata('print')!=""): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <i class="fa fa-info-circle"></i>
                                  <?=$this->session->flashdata('print')?>
                                </div>    
                              <?php endif ?>
                              <?php if ($this->cart->contents()!=null): ?>
                             <div class="panel-heading">
                               <div id="shopcart" class="panel-title">Shop Cart</div>
                              </div>        
                                <table class="table">
                                  <thead>
                                   <tr>
                                        <th>Id</th>
                                        <th>Nama</th>     
                                        <th>Expired</th>            
                                        <th>Kategori</th>            
                                        <th>Harga</th>
                                        <th>Qty</th>                                        
                                        <th>Aksi</th>         
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($this->cart->contents() as $items): ?>
                                      <tr>           
                                        <td><?=$items['id']?></td>
                                        <td><?=$items['name']?></td>       
                                        <td><?=$items['options']['tahun']?></td>
                                        <td><?=$items['options']['kategori']?></td>          
                                        <td>Rp.<?=number_format($items['price'])?></td>
                                        <td>
                                          <form method="post" action="<?=base_url('index.php/transaksi/ubahqty/'.$items['rowid'])?>">
                                            <input type="hidden" name="stok" value="<?=$items['options']['stok']?>">
                                            <input onchange="submit()" type="text" class="form-control" name="qty" value="<?=$items['qty']?>">
                                          </form>
                                        </td>
                                        <td>
                                          <a href="<?=base_url('index.php/transaksi/hapuscart/'.$items['rowid'])?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                      </tr>
                                    <?php endforeach ?>
                                    <tr style="background-color: #00AAFF;color: white">
                                      <td colspan="4">Total Barang</td><td><?=($this->cart->total_items())?></td><td colspan="2"></td>
                                    </tr>   
                                    <tr style="background-color: #41B314;color: white">
                                      <td colspan="4">Total</td><td>Rp.<?=number_format($this->cart->total())?></td><td colspan="2"></td>
                                    </tr>       
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <form method="POST" action="<?=base_url('index.php/transaksi/bayar')?>">
                                        <?php foreach ($this->cart->contents() as $items): ?>
                                          <input type="hidden" name="qty[]" value="<?=$items['qty']?>">
                                          <input type="hidden" name="id_buku[]" value="<?=$items['id']?>">
                                          <input type="hidden" name="stok[]" value="<?=$items['options']['stok']?>">      
                                        <?php endforeach?>
                                        <td>Jumlah Uang :</td>
                                        <td>
                                          <input style="border-color: green" required type="text" name="uang" class="form-control">
                                        </td>
                                        <td>Nama Pembeli :</td>
                                        <td> 
                                          <input style="border-color: green" required type="text" name="nama_pembeli" class="form-control">
                                        </td>
                                        <td>
                                          <button type="submit" class="btn btn-success">Bayar</button>
                                        </td>
                                      </form>
                                    </tr>
                                  </tfoot>
                                </table>    
                              <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>