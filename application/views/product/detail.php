<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url().'assets/'; ?>images/single-product.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Beranda</a></span> / <span class="mr-2"><a href="#">Produk </a></span></p>
        <h1 class="mb-0 bread">Detail Produk</h1>
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
				<label class="col-sm-3 col-form-label">Kategori *</label>
			  	<div class="col-sm-9">
				  <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $rec->category_name; ?>" disabled>
				</div>
          	</div>
          	<div class="form-group row">
				<label class="col-sm-3 col-form-label">Kode *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="code" name="code" value="<?php echo $rec->code; ?>" disabled>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Produk *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name" value="<?php echo $rec->name; ?>" disabled>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Deskripsi *</label>
				<div class="col-sm-9">
            		<textarea class="form-control" id="description" name="description" disabled><?php echo $rec->description; ?></textarea>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Stok Etalase *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="stock" value="<?php echo $rec->stock; ?>" disabled>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Stok Warehouse *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="stock_wh" value="<?php echo $rec->stock_wh; ?>" disabled>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Satuan *</label>
			  	<div class="col-sm-9">
					<input type="text" class="form-control" id="unit" value="<?php echo $rec->unit; ?>" disabled>
				</div>
          	</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Harga (Rp.) *</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="nominal" value="<?php echo $rec->price; ?>" disabled>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Homepage *</label>
				<div class="col-sm-9">
					<div class="radio">
						<label><input type="radio" name="homepage" id="homepage1" class="mr-2" value="1" <?php echo ($rec->homepage==true) ? 'checked' : ''; ?> disabled> Yes</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="homepage" name="homepage2" class="mr-2" value="0" <?php echo ($rec->homepage==false) ? 'checked' : ''; ?> disabled> No</label>
					</div>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Foto *</label>
				<div class="col-sm-9">
            		<img src="<?php echo base_url().'photo/product/'.$rec->photo; ?>" width="200px" height="200px">
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Aktif *</label>
				<div class="col-sm-9">
					<div class="radio">
						<label><input type="radio" name="active" id="active1" class="mr-2" value="1" <?php echo ($rec->active==true) ? 'checked' : ''; ?> disabled> Yes</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="active" name="active2" class="mr-2" value="0" <?php echo ($rec->active==false) ? 'checked' : ''; ?> disabled> No</label>
					</div>
          		</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label"></label>
				<div class="col-sm-9">
            		<input type="button" id="btnback" name="btnback" value="Kembali" class="btn btn-primary py-3 px-5" onclick=location.href="<?php echo base_url().'product'; ?>">
					<input type="button" id="btnedit" name="btnedit" value="Ubah" class="btn btn-warning py-3 px-5" onclick=location.href="<?php echo base_url().'product/edit/'.$rec->slug; ?>">
				</div>
          	</div>
        </form>
      
      </div>

    </div>
  </div>
</section>