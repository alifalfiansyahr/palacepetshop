<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> </p>
        <h1 class="mb-0 bread"><?php echo $title; ?></h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
	<div class="container">
	<div class="row block-9">
		<div class="col-md-6 order-md-last d-flex">
		<form id="form_contact" action="<?php echo base_url(); ?>contact" class="bg-white p-5 contact-form" method="post">

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
		  
			<div class="form-group">
			<input type="text" id="name" name="name" class="form-control" placeholder="Nama" maxlength="50" required>
			<?php echo form_error('name', '<span class="help-block" style="color: red">', '</span>'); ?>
			</div>
			<div class="form-group">
			<input type="email" id="email" name="email" class="form-control" placeholder="Email" maxlength="50" required>
			<?php echo form_error('email', '<span class="help-block" style="color: red">', '</span>'); ?>
			</div>
			<div class="form-group">
			<input type="text" id="subject" name="subject" class="form-control" placeholder="Subjek" maxlength="300" required>
			<?php echo form_error('subject', '<span class="help-block" style="color: red">', '</span>'); ?>
			</div>
			<div class="form-group">
			<textarea id="message" name="message"  cols="30" rows="7" class="form-control" placeholder="Pesan ..." required></textarea>
			<?php echo form_error('message', '<span class="help-block" style="color: red">', '</span>'); ?>
			</div>
			<div class="form-group">
			<input type="submit" value="Kirim" class="btn btn-primary py-3 px-5">
			</div>
		</form>
		
		</div>

		<div class="col-md-6">
			<div class="jumbotron bg-white" style="padding:3px;">
				Alamat : <br />
				Jalan Bugis No.144, RT.5 RW.12, Kb Bawang, Tanjung Priok, Kota Jakarta Utara.
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1127112606987!2d106.88401161476851!3d-6.115526095571817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1fc05387facd%3A0xf398fb03683ec653!2sJl.%20Bugis%20No.144%2C%20RT.10%2FRW.12%2C%20Kb.%20Bawang%2C%20Tj.%20Priok%2C%20Kota%20Jkt%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2014320!5e0!3m2!1sen!2sid!4v1589016988060!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
	</div>
</section>