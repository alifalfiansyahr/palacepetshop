<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> / <span class="mr-2"><a href="#">Layanan </a></span></p>
        <h1 class="mb-0 bread">Detail Layanan</h1>
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
				<label class="col-sm-3 col-form-label">Judul *</label>
			  	<div class="col-sm-9">
				  <input type="text" class="form-control" id="title" name="title" value="<?php echo $rec->title; ?>" disabled>
				</div>
          	</div>
          	<div class="form-group row">
				<label class="col-sm-3 col-form-label">Isi *</label>
				<div class="col-sm-9">
            		<textarea class="form-control" id="content" name="content" disabled><?php echo $rec->content; ?></textarea>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Foto *</label>
				<div class="col-sm-9">
            		<img src="<?php echo base_url().'photo/services/'.(($rec->image!=null) ? $rec->image : 'no_picture.jpg'); ?>" width="200px" height="200px">
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">
            		<input type="button" id="btnback" name="btnback" value="Back" class="btn btn-primary py-3 px-5" onclick=location.href="<?php echo base_url().'services'; ?>">
					<input type="button" id="btnedit" name="btnedit" value="Edit" class="btn btn-warning py-3 px-5" onclick=location.href="<?php echo base_url().'services/edit/'.$rec->slug; ?>">
				</div>
          	</div>
        </form>
      
      </div>

    </div>
  </div>
</section>