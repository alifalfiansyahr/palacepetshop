<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span></p>
        <h1 class="mb-0 bread">Detail Email</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-12 order-md-last d-flex">

        <form id="form_product" action="#" class="bg-white p-5 contact-form" method="post">

          <?php if($this->session->userdata('status')!=null) { ?>
              <div class="alert alert-<?php echo $this->session->userdata('status'); ?> align-center" style="text-align: center;" role="alert">
                  <strong>
                    <?php echo $this->session->userdata('pesan'); ?>
                  </strong>
              </div>
              
              <br />
          <?php 
              $this->session->set_userdata('status', null);
          }
          ?>
          
        <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Nama </label>
			  	<div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $rec->name; ?>" disabled>
          </div>
        </div>
        <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Email</label>
			  	<div class="col-sm-9">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $rec->email; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Subjek</label>
			  	<div class="col-sm-9">
            <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $rec->subject; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
				  <label class="col-sm-3 col-form-label">Pesan *</label>
				  <div class="col-sm-9">
          <textarea class="form-control" id="message" name="message" readonly><?php echo $rec->message; ?></textarea>
          </div>
        </div>
  
        <div class="form-group row">
          <label class="col-sm-3 col-form-label"></label>
          <div class="col-sm-9">
            <input type="button" id="btnback" name="btnback" value="Kembali" class="btn btn-primary py-3 px-5" onclick=location.href="<?php echo base_url().'contact/admin'; ?>">
          </div>
        </div>
 
      </form>
      
      </div>
    </div>
  </div>
</section>