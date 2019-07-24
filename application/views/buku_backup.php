<div class="panel">
  <div class="panel-heading">
    <div class="panel-title">
       <a style="" href="<?=base_url()?>" ><i style="font-size: 20px" class="lnr lnr-home"></i></a> CRUD Buku
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
    <center><a href="#modalTambah" data-targe="#modalTambah" data-toggle="modal" class="btn btn-primary">Tambah Buku</a></center>
    <?php if ($tampil_buku!=null): ?>
      <table class="table">
      <thead>
        <tr>
          <th>Id buku</th>
          <th>Judul buku</th>     
          <th>Tahun</th>            
          <th>Nama Kategori</th>            
          <th>Harga</th>            
          <th>Cover Foto</th>            
          <th>Penerbit</th>            
          <th>Penulis</th>            
          <th>Stok</th>   
          <th>Aksi</th>         
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Id buku</th>
          <th>Judul buku</th>     
          <th>Tahun</th>            
          <th>Nama Kategori</th>            
          <th>Harga</th>            
          <th>Cover Foto</th>            
          <th>Penerbit</th>            
          <th>Penulis</th>            
          <th>Stok</th>   
          <th>Aksi</th>         
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($tampil_buku as $buku): ?>
          <?php if ($buku->stok==0): ?>
          <tr style="background-color: #777;color: white;">
          <?php elseif ($buku->stok<5): ?>
          <tr style="background-color: #f0ad4e;color:white;">         
          <?php elseif($buku->stok<10): ?>
          <tr style="background-color: #d9edf7;">   
          <?php endif?>
            <td><?=$buku->id_buku?></td>
            <td><?=$buku->judul_buku?></td>       
            <td><?=$buku->tahun?></td>
            <td><?=$buku->nama_kategori?></td>          
            <td>Rp.<?=number_format($buku->harga)?></td>
            <td><img style="max-width: 100px" src="<?=base_url()?>assets/img/<?=$buku->foto_cover?>"></td> 
            <td><?=$buku->penerbit?></td>         
            <td><?=$buku->penulis?></td>
            <td><?=$buku->stok?></td>
            <td>
              <a href="#edit" onclick="edit(<?=$buku->id_buku?>)" data-toggle="modal"  class="btn btn-warning">Ubah</a>
              <a href="<?=base_url('index.php/buku/hapus/'.$buku->id_buku)?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table> 
       <span class="label label-default">STOK KOSONG</span>
       <span class="label label-warning">STOK KURANG DARI 5</span>
       <span class="label label-info">STOK KURANG DARI 10</span><br><br>       
        <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit buku</h4>
                        </div>
                        <div class="modal-body">

                           <table class="table">
                            <form method="POST" action="<?=base_url('index.php/buku/ubah')?>" enctype="multipart/form-data">
                            <tr>
                              <td>Judul buku :</td>
                              <td>
                                <div class="input-group">
                                  <input required type="text" id="judul_buku" name="judul_buku" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Tahun :</td>
                              <td>
                                <div class="input-group">
                                  <input type="int" id="tahun" name="tahun" class="form-control">
                                </div>
                              </td>
                            </tr> 
                            <tr>
                              <td>Kategori :</td>
                              <td>
                                <select name="id_kategori"  id="kategori" class="form-control">
                                  <?php foreach ($tampil_kategori as $kat): ?>
                                    <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>  
                                  <?php endforeach ?>
                                </select>
                              </td>
                            </tr>   
                            <tr>
                              <td>Harga :</td>
                              <td>
                                <div class="input-group">
                                  <input required type="number" id="harga" name="harga" class="form-control">
                                </div>
                              </td>
                            </tr> 
                            <tr>
                              <td>Foto Cover :</td>
                              <td>
                                <div class="input-group">
                                  <input type="file" name="foto_cover" class="form-control">
                                </div>
                              </td>
                            </tr>   
                            <tr>
                              <td>Penerbit</td>
                              <td>
                                <div class="input-group">
                                  <input type="text" id="penerbit" name="penerbit" class="form-control">
                                </div>
                              </td>
                            </tr>  
                             <tr>
                              <td>Penulis</td>
                              <td>
                                <div class="input-group">
                                  <input type="text" id="penulis" name="penulis" class="form-control">
                                </div>
                              </td>
                            </tr>  
                             <tr>
                              <td>Stok</td>
                              <td>
                                <div class="input-group">
                                  <input required type="text" id="stok" name="stok" class="form-control">
                                </div>
                              </td>
                            </tr>  
                              <td></td>
                              <td>
                                <div class="input-group">
                                  <input type="hidden" id="id_buku" name="id_buku">
                                  <input type="submit" class="btn btn-success">
                                </div>
                              </td>
                            </tr>
                            </form>
                           </table>
                        </div>
                        <div class="modal-footer">                           
                            <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
        </div>
    <?php endif ?>    
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah buku</h4>
                        </div>
                        <div class="modal-body">
                           <table class="table">
                            <form method="POST" action="<?=base_url('index.php/buku/tambah')?>" enctype="multipart/form-data">
                            <tr>
                              <td>Judul buku :</td>
                              <td>
                                <div class="input-group">
                                  <input required type="text" name="judul_buku" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Tahun :</td>
                              <td>
                                <div class="input-group">
                                  <input type="int" name="tahun" class="form-control">
                                </div>
                              </td>
                            </tr> 
                            <tr>
                              <td>Kategori :</td>
                              <td>
                                <select required name="id_kategori" class="form-control">
                                   <option></option>
                                  <?php foreach ($tampil_kategori as $kat): ?>
                                    <option value="<?=$kat->id_kategori?>"><?=$kat->nama_kategori?></option>  
                                  <?php endforeach ?>
                                </select>
                              </td>
                            </tr>   
                            <tr>
                              <td>Harga :</td>
                              <td>
                                <div class="input-group">
                                  <input required type="number" name="harga" class="form-control">
                                </div>
                              </td>
                            </tr> 
                            <tr>
                              <td>Foto Cover :</td>
                              <td>
                                <div class="input-group">
                                  <input type="file" name="foto_cover" class="form-control">
                                </div>
                              </td>
                            </tr>   
                            <tr>
                              <td>Penerbit</td>
                              <td>
                                <div class="input-group">
                                  <input type="text" name="penerbit" class="form-control">
                                </div>
                              </td>
                            </tr>  
                             <tr>
                              <td>Penulis</td>
                              <td>
                                <div class="input-group">
                                  <input type="text" name="penulis" class="form-control">
                                </div>
                              </td>
                            </tr>  
                             <tr>
                              <td>Stok</td>
                              <td>
                                <div class="input-group">
                                  <input required type="text" name="stok" class="form-control">
                                </div>
                              </td>
                            </tr>  
                              <td></td>
                              <td>
                                <div class="input-group">
                                  <input type="submit" class="btn btn-success">
                                </div>
                              </td>
                            </tr>
                            </form>
                           </table>
                        </div>
                        <div class="modal-footer">                           
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(a) {
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/buku/edit_buku/"+a,
      dataType:"json",
      success:function (detail) {
        $("#id_buku").val(detail.id_buku);
        $("#judul_buku").val(detail.judul_buku);
        $("#tahun").val(detail.tahun);
        $("#kategori").val(detail.id_kategori);
        $("#nama_kategori").val(detail.nama_kategori);
        $("#harga").val(detail.harga);
        $("#foto_cover").val(detail.foto_cover);
        $("#penerbit").val(detail.penerbit);
        $("#penulis").val(detail.penulis);
        $("#stok").val(detail.stok);
      }
    });
  }
</script>