<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Laporan Toko</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<div  class="metric">
					<a href="<?=base_url('index.php/buku')?>">
						<span class="icon"><i class="fa fa-book"></i></span>
						<p>
							<span class="number"><?=$dataBuku?></span>
							<span class="title">Barang Tersedia</span>
						</p>
						<br>
					</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<a href="<?=base_url('index.php/kategori')?>">
						<span class="icon"><i class="glyphicon glyphicon-th-list"></i></span>
						<p>
							<span class="number"><?=$dataKategori?></span>
							<span class="title">Kategori Tersedia</span><br>
						</p><br>
						<br>
					</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<a href="<?=base_url('index.php/history')?>">
						<span class="icon"><i class="glyphicon glyphicon-time"></i></span>
						<p>
							<span class="number"><?=$dataTransaksiTotal?></span>
							<span class="title">Kali Transaksi Terjadi</span>
						</p><br>
					</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="metric">
					<a href="<?=base_url('index.php/history')?>">
						<span class="icon"><i class="lnr lnr-cart"></i></span>
						<p>
							<span class="number"><?=$dataTransaksi?></span>
							<span class="title">Kali Transaksi dengan akun ini</span>
						</p>
						<br>
					</a>
				</div>
			</div>
		</div>	
		<div class="row">
			<?php if ($dataBuku10!=null): ?>	
			<div class="col-md-3">
				<div class="metric">
					<a href="<?=base_url('index.php/buku')?>">
						<span class="icon" style="color: white;background-color: #F9354C">!</span>
						<p>
							<span class="number"><?=$dataBuku10?> barang </span>
							<span class="title">stok menipis</span>
						</p>
						<br>
					</a>
				</div>
			</div>					
			<?php endif ?>		
		</div>		
	</div>
</div>