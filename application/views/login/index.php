<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span></p>
        <h1 class="mb-0 bread">Login</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">

        <form action="<?php echo base_url(); ?>login" class="bg-white p-5 contact-form" method="post">

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
            <input type="email" class="form-control" placeholder="Email ..." id="email" name="email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password ..."  id="password" name="password" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Log In" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      
      </div>

      <div class="col-md-6 d-flex">
        <div class="bg-white">
          <img src="<?php echo base_url().'assets/images/login.jpeg' ?>" style="width:520px;height540px;">
        </div>
      </div>

    </div>
  </div>
</section>