<html lang="en">
  <head>
    <title>Palace Pet Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="<?php echo base_url().'assets/'; ?>images/favicon-tastivo.png">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">(021) XXX-XXXX</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">info@palacepetshop.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Buka Setiap Hari :)</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo base_url(); ?>">Palace Pet Shop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
             <li class="nav-item active"><a href="<?php echo base_url(); ?>" class="nav-link">Beranda</a></li>
             <li class="nav-item"><a href="<?php echo base_url().'about'; ?>" class="nav-link">Tentang Kami</a></li>
			 <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
			  	<?php
				  	$category = category();
            if($category!=null)
            {
              foreach($category as $r)
              {
                echo '<a class="dropdown-item" href="'.base_url().'category/'.$r->slug.'">'.$r->name.'</a>';
              }
            }
				  ?>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <?php
                  $services = services();
                  if($services!=null)
                  {
                    foreach($services as $r)
                    {
                      echo '<a class="dropdown-item" href="'.base_url().'services/view/'.$r->slug.'">'.$r->title.'</a>';
                    }
                  }
                ?>
              </div>
            </li>
             <li class="nav-item"><a href="<?php echo base_url().'contact'; ?>" class="nav-link">Kontak Kami</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <?php $this->load->view($view); ?>

    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Palace Pet Shop</h2>
              <p>Toko perlengkapan hewan peliharaan, yang menyediakan berbagai produk makanan dan perlengkapan, serta layanan kesehatan hewan peliharaan Anda.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url().'about'; ?>" class="py-2 d-block">Tentang Kami</a></li>
                <li><a href="<?php echo base_url().'category/all'; ?>" class="py-2 d-block">Produk</a></li>
                <li><a href="<?php echo base_url().'contactus'; ?>" class="py-2 d-block">Kontak Kami</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Hubungi Kami</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan Bugis No.144, RT.5 RW.12, Kb Bawang, Tanjung Priok, Kota Jakarta Utara, Indonesia</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">021-XXX-XXXX</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@petshop.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
               Copyright &copy;<script>document.write(new Date().getFullYear());</script> Palace Pet Shop
            </p>
            
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url().'assets/'; ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/popper.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/aos.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/google-map.js"></script>
  <script src="<?php echo base_url().'assets/'; ?>js/main.js"></script>
   
  </body>
</html>
