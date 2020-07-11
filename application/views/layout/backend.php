      <?php if(isset($css['sweetalert'])) { ?>
		<!-- Sweetalert Css -->
		<link href="<?php echo base_url().'assets/plugins/'; ?>sweetalert/sweetalert.css" rel="stylesheet" />
	<?php } ?>

   <!DOCTYPE html>
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
             <li class="nav-item active"><a href="<?php echo base_url().'dashboard'; ?>" class="nav-link">Beranda</a></li>
             <li class="nav-item active"><a href="<?php echo base_url().'about/edit'; ?>" class="nav-link">Tentang Kami</a></li>
             <li class="nav-item"><a href="<?php echo base_url().'product'; ?>" class="nav-link">Produk</a></li>
             <li class="nav-item"><a href="<?php echo base_url().'services'; ?>" class="nav-link">Layanan</a></li>
             <li class="nav-item"><a href="<?php echo base_url().'contact/admin'; ?>" class="nav-link">Hubungi Kami</a></li>
			       <li class="nav-item"><a href="<?php echo base_url().'login/logout'; ?>" class="nav-link">Logout</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <?php $this->load->view($view); ?>

    <hr >
    
    <footer class="ftco-footer ftco-section">
      <div class="container">
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
    
  <?php if(isset($js['sweetalert'])) { ?>
	<!-- SweetAlert Plugin Js -->
	<script src="<?php echo base_url().'assets/plugins/'; ?>sweetalert/sweetalert.min.js"></script>
   <?php } ?>
   
  </body>
</html>
