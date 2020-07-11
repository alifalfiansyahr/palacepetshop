<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">

				<div class="text-right">
					<a href="<?php echo base_url().'services/create'; ?>" class="btn btn-success">+ Layanan Baru</a>
				</div>
				<br />

				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">	
								<th width="80%">Judul</th>
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
									
									<td class="product-name">
										<h3><?php echo $p->title; ?></h3>
									</td>
									
									<td class="text-center">
										<a class='btn btn-sm btn-info' href="<?php echo base_url().'services/detail/'.$p->slug; ?>">detail</a>
										<a class='btn btn-sm btn-warning' href="<?php echo base_url().'services/edit/'.$p->slug; ?>">edit</a>
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
	</div>
</section>