<div class="panel">
	<div class="panel-heading">
		<div class="panel-title">
    <a style="text-decoration: none" href="<?=base_url()?>" ><i style="font-size: 20px" class="lnr lnr-home"></i></a> CRUD User
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
		<center><a href="#modalTambah" data-targe="#modalTambah" data-toggle="modal" class="btn btn-primary">Tambah User</a></center>
		<table class="table">
			<thead>
				<tr>
					<th>Id User</th>
					<th>Nama User</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tampil_user as $user): ?>
					<tr>
						<td><?=$user->id_user?></td>
						<td><?=$user->nama_user?></td>
						<td><?=$user->username?></td>
						<td><?=$user->password?></td>
						<td><?=$user->level?></td>
						<td>
							<a href="#edit" onclick="edit(<?=$user->id_user?>)" data-toggle="modal"  class="btn btn-warning">Ubah</a>
							<a href="<?=base_url('index.php/user/hapus/'.$user->id_user)?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
                        </div>
                        <div class="modal-body">
                           <table class="table">
                           	<form method="POST" action="<?=base_url('index.php/user/tambah')?>">
                           	<tr>
                           		<td>Nama User :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="text" name="nama_user" class="form-control">
                           			</div>
                           		</td>
                           	</tr>
                           	<tr>
                           		<td>Username :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="text" name="username" class="form-control">
                           			</div>
                           		</td>
                           	</tr>
							<tr>
	                           	<td>Password :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="password" name="password" class="form-control">
                           			</div>
                           		</td>
                           	</tr>
                           	<tr>
                           		<td>Level :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="number" name="level" class="form-control">
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
                           	</form>
                           </table>
                        </div>
                        <div class="modal-footer">                           
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Edit User</h4>
                        </div>
                        <div class="modal-body">
                           <table class="table">
                           	<form method="POST" action="<?=base_url('index.php/user/ubah')?>">
                           	<tr>
                           		<td>Nama User :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="text" id="nama_user" name="nama_user" class="form-control">
                           			</div>
                           		</td>
                           	</tr>
                           	<tr>
                           		<td>Username :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="text" id="username" name="username" class="form-control">
                           			</div>
                           		</td>
                           	</tr>
							             <tr>
	                           	<td>Password :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="text" id="password" name="password" class="form-control">
                           			</div>
                           		</td>
                           	</tr>
                           	<tr>
                           		<td>Level :</td>
                           		<td>
                           			<div class="input-group">
                           				<input type="number" id="level" name="level" class="form-control">
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
                           	<input type="hidden" name="id_user" id="id_user">                            
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
			url:"<?=base_url()?>index.php/user/edit_user/"+a,
			dataType:"json",
			success:function (data) {
				$("#id_user").val(data.id_user);
				$("#nama_user").val(data.nama_user);
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#level").val(data.level);
			}
		});
	}
</script>