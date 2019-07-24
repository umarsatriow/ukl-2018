<div class="panel">
	<div class="panel-heading">
		<div class="panel-title">
       <a style="text-decoration: none" href="<?=base_url()?>" ><i style="font-size: 20px" class="lnr lnr-home"></i></a> CRUD Kategori  
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
		<center><a href="#modalTambah" data-targe="#modalTambah" data-toggle="modal" class="btn btn-primary">Tambah Kategori Buku</a></center>
    <?php if ($tampil_kategori!=null): ?>
		<table class="table">
			<thead>
				<tr>
					<th>Id kategori</th>
					<th>Nama kategori</th>		
          <th></th>			
				</tr>
			</thead>
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