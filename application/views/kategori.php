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
                               <a style="" href="<?=base_url()?>" ><i style="font-size: 30px;color: black" class="lnr lnr-home"></i></a> CRUD KATEGORI
                            </h2>                          
                          </div>  
                        <div class="body">
                            <div class="table-responsive">
                              <center><a href="#modalTambah" data-targe="#modalTambah" data-toggle="modal" class="btn btn-primary">Tambah Kategori Buku</a></center>
                              <?php if ($this->session->flashdata('pesan')!=""): ?>
                                  <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="fa fa-info-circle"></i>
                                    <?=$this->session->flashdata('pesan')?>
                                  </div>
                                <?php endif ?>
                                <?php if ($tampil_kategori!=null): ?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                      <tr>
                                        <th>Id kategori</th>
                                        <th>Nama kategori</th>    
                                        <th>Aksi</th>     
                                      </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>Id kategori</th>
                                          <th>Nama kategori</th>    
                                          <th>Aksi</th>     
                                      </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php foreach ($tampil_kategori as $kategori): ?>
                                      <tr>
                                        <td><?=$kategori->id_kategori?></td>
                                        <td><?=$kategori->nama_kategori?></td>            
                                        <td>
                                          <a href="#edit" onclick="edit(<?=$kategori->id_kategori?>)" data-toggle="modal"  class="btn btn-warning">Ubah</a>
                                          <a href="<?=base_url('index.php/kategori/hapus/'.$kategori->id_kategori)?>" class="btn btn-danger" onclick="return confirm('Buku yang berkatergori berikut akan ikut dihapus, yakin ?')">Hapus</a>
                                        </td>
                                      </tr>
                                      <?php endforeach ?>
                                    </tbody>
                                </table>
                                 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title" id="defaultModalLabel">Edit kategori</h4>
                                        </div>
                                        <div class="modal-body">
                                         <table class="table">
                                          <form method="POST" action="<?=base_url('index.php/kategori/ubah')?>">
                                            <tr>
                                              <td>Nama kategori :</td>
                                              <td>
                                                <div class="input-group">
                                                  <input required type="text" id="nama_kategori" name="nama_kategori" class="form-control">
                                                </div>
                                              </td>
                                            </tr>                           
                                            <tr>
                                              <td></td>
                                              <td>
                                                <div class="input-group">
                                                  <input type="submit" class="btn btn-success">
                                                </div>
                                              </td>
                                            </tr>
                                            <input type="hidden" name="id_kategori" id="id_kategori">
                                          </form>
                                        </table>
                                      </div>
                                      <div class="modal-footer">                           
                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                              <?php endif?>
                              <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah kategori</h4>
                        </div>
                        <div class="modal-body">
                           <table class="table">
                            <form method="POST" action="<?=base_url('index.php/kategori/tambah')?>">
                            <tr>
                              <td>Nama kategori :</td>
                              <td>
                                <div class="input-group">
                                  <input required type="text" name="nama_kategori" class="form-control">
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
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
</body>
<script type="text/javascript">
  function edit(a) {
    $.ajax({
      type:"post",
      url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,
      dataType:"json",
      success:function (data) {
        $("#id_kategori").val(data.id_kategori);
        $("#nama_kategori").val(data.nama_kategori);
      }
    });
  }
</script>