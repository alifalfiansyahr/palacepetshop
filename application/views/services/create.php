<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> / <span class="mr-2"><a href="#">Layanan </a></span></p>
        <h1 class="mb-0 bread"><?php echo $title; ?></h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-12 order-md-last d-flex">

        <form id="form_product" action="<?php echo base_url(); ?>services/create" class="bg-white p-5 contact-form" method="post" enctype="multipart/form-data">

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
				  	<input type="text" class="form-control" id="title" name="title" maxlength="200" required>
					<?php echo form_error('title', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Isi *</label>
				<div class="col-sm-9">
            		<textarea class="form-control" id="content" name="content" required></textarea>
					<?php echo form_error('content', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Foto *</label>
				<div class="col-sm-9">
            		<input type="file" class="form-control" id="photo" name="photo" required accept=".jpg,.jpeg,.png" onchange="validateFileType(this.id)">
					<?php echo form_error('photo', '<span class="help-block" style="color: red">', '</span>'); ?>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">
            		<input type="submit" id="btnsave" name="btnsave" value="Save" class="btn btn-primary py-3 px-5">
				</div>
          </div>
        </form>
      
      </div>

    </div>
  </div>
</section>

<script>

	function validateFileType(id)
    {
        var fileName = document.getElementById(id).value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if(extFile!='jpeg'&&extFile!='jpg'&&extFile!='png'){
            alert('File type must jpeg, jpg, or png');
            document.getElementById(id).value = "";
        }
    }

</script>