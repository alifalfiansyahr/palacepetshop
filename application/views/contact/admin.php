<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">

				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">	
								<th>Nama</th>
								<th>Email</th>
								<th>Subjek</th>
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
									
									<td><?php echo $p->name; ?></td>
									<td><?php echo $p->email; ?></td>
									<td><?php echo $p->subject; ?></td>
									<td class="text-center">
										<a class='btn btn-sm btn-info' href="<?php echo base_url().'contact/detail/'.$p->id; ?>">detail</a>
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
