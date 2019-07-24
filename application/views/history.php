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
                               <a style="" href="<?=base_url()?>" ><i style="font-size: 30px;color: black" class="lnr lnr-home"></i></a> HISTORY TRANSAKSI
                            </h2>                          
                          </div> 
                        <div class="body">
                            <div class="table-responsive">
                               <?php if ($this->session->flashdata('pesan')!=""): ?>
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <i class="fa fa-info-circle"></i>
                                      <?=$this->session->flashdata('pesan')?>
                                  </div>
                              <?php endif ?>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                    <tfoot>
                                        <tr>
                                          <th>Id Transaksi</th>
                                          <th>Nama User</th> 
                                          <th>Nama Pembeli</th>         
                                          <th>Total Belanja</th>
                                          <th>Tanggal Beli</th>
                                          <th></th>
                                      </tr>
                                    </tfoot>
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
                                          <a onclick="return confirm('Apakah Anda Yakin ?')" href="<?=base_url('index.php/history/hapus/'.$transaksi->id_transaksi)?>" class="btn btn-danger">x</a>
                                        </td>
                                        </div>
                                      </tr> 
                                      <?php endforeach ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>