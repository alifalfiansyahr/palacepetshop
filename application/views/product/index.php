<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
                    	<?php if($paging!=null) { ?>
							<?php echo $paging; ?>
						<?php } ?>
                    </ul>
				</div>
			</div>
			<br />
			<a href="<?php echo base_url().'product/create'; ?>" class="btn btn-success">+ Produk Baru</a>
		</div>
		<br />
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">	
								<th>&nbsp;</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Stok Etalase</th>
								<th>Stok Warehouse</th>
								<th>Satuan</th>
								<th>aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if($rec!=null) 
							{ 
								foreach($rec as $p)
								{
							?>
								<tr class="text-center">
									
									<td class="image-prod"><div class="img" style="background-image:url(<?php echo base_url(); ?>photo/product/<?php echo $p->photo; ?>);"></div></td>
									
									<td class="product-name">
										<h3><?php echo $p->name; ?></h3>
										<p><?php echo (strlen($p->description)>300) ? substr($p->description,0,300).' ...' : $p->description; ?></p>
									</td>
									
									<td class="price">Rp. <?php echo number_format($p->price,2,",","."); ?></td>
									
									<td class=""><?php echo $p->stock; ?></td>
									<td class=""><?php echo $p->stock_wh; ?></td>
									<td class=""><?php echo $p->unit; ?></td>
									
									<td class="text-center">
										<a class='btn btn-sm btn-info' href="<?php echo base_url().'product/detail/'.$p->slug; ?>">detail</a>
										<a class='btn btn-sm btn-warning' href="<?php echo base_url().'product/edit/'.$p->slug; ?>">edit</a>
									</td>
								</tr><!-- END TR-->

							<?php
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
                    	<?php if($paging!=null) { ?>
							<?php echo $paging; ?>
						<?php } ?>
                    </ul>
				</div>
			</div>
		</div>
	</div>
</section>