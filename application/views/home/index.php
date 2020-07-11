<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(<?php echo base_url().'assets/'; ?>images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">Selamat Datang di <br />Palace Petshop</h1>
	              <h2 class="subheading mb-4">Kami menyediakan makanan hewan peliharaan Anda</h2>
	              <p><a href="#" class="btn btn-primary">Lihat</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(<?php echo base_url().'assets/'; ?>images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">Layanan Kebutuhan Hewan</h1>
	              <h2 class="subheading mb-4">Kami menyediakan layanan Grooming & Klinik hewan peliharaan Anda</h2>
	              <p><a href="#" class="btn btn-primary">Lihat</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

<section class="ftco-section">
	<div class="container">
		<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Gratis Ongkir</h3>
                <span>Area DKI Jakarta</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Sehat & Original</h3>
                <span>Produk Makanan</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<img src="<?php echo base_url().'assets/'; ?>images/grooming.png">
              </div>
              <div class="media-body">
                <h3 class="heading">Grooming</h3>
                <span>Pelayanan Maksimal</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
			  	<img src="<?php echo base_url().'assets/'; ?>images/clinic.png">
              </div>
              <div class="media-body">
                <h3 class="heading">Klinik</h3>
                <span>Buka 24 Jam</span>
              </div>
            </div>      
          </div>
        </div>
	</div>
</section>

<hr>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<!-- <span class="subheading">Featured Products</span> -->
            <h2 class="mb-4">Produk Kami</h2>
            <p>Temukan produk kebutuhan hewan Anda</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
                <?php 
                if($productHome!=null) 
                { 
                    foreach($productHome as $p)
                    {
                ?>

                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="<?php echo base_url(); ?>detail-product/<?php echo $p->slug; ?>" class="img-prod"><img class="img-fluid" style="height:202px;width=253px;" src="<?php echo base_url(); ?>photo/product/<?php echo $p->photo; ?>" alt="<?php echo $p->name; ?>">
                                    <!-- <span class="status">30%</span> -->
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="<?php echo base_url(); ?>detail-product/<?php echo $p->slug; ?>"><?php echo $p->name; ?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <span class="price-sale">Rp. <?php echo number_format($p->price,2,",","."); ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                    }

                }
                ?>
    			
    		</div>
    	</div>
    </section>

	<section class="ftco-section img" style="background-image: url(<?php echo base_url().'assets/'; ?>images/bg_3.jpg);">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
					<h2 class="mb-4">Grooming</h2>
					<p>Layanan perawatan dari Kami memberikan kepuasan konsumen.</p>
					<a href="#" class='btn btn-sm btn-success'>info selengkapnya...</a>
					<h2 class="mb-4">Klinik</h2>
					<p>Klinik Palace hadir dan buka setiap hari.</p>
					<a href="#" class='btn btn-sm btn-success'>info selengkapnya...</a>
				</div>
			</div>   		
		</div>
	</section>

		<section class="ftco-section ftco-partner">
    	<div class="container">
    		<div class="row">
          <div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="<?php echo base_url().'assets/'; ?>images/Whiskas.png" class="img-fluid" alt="Whiskas"></a>
    			</div>
          <div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="<?php echo base_url().'assets/'; ?>images/royal canin.png" class="img-fluid" alt="Royal Canin"></a>
          </div>
          <div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="<?php echo base_url().'assets/'; ?>images/Friskies.png" class="img-fluid" alt="Friskies"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="<?php echo base_url().'assets/'; ?>images/gojek.png" class="img-fluid" alt="Gojek"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="<?php echo base_url().'assets/'; ?>images/grab.png" class="img-fluid" alt="Grab"></a>
    			</div>
    		</div>
    	</div>
    </section>